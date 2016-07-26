<?php

namespace Frontend\Controllers;

use Alloy\Models\Categories;
use Illuminate\Http\Response;
use Lang,
    Uuid,
    URL;
use Alloy\Models\Courses;
use Alloy\Models\Lessons;
use Alloy\Models\Questions;
use Alloy\Models\Exams;
use Alloy\Validations\CourseValidate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Frontend\Controllers\BaseController as BaseController;

class CourseController extends BaseController
{
    protected $path;

    public function __construct()
    {
        $this->path = [
            'course' => [
                'video' => 'videos-courses'
            ],
            'lesson' => [
                'video' => 'videos-lessons',
                'attach' => 'attach-lessons'
            ]
        ];
    }

    public function index()
    {
        $courses = Courses::where('status', 'active')->get();

        return view('Frontend::courses.index', [
            'courses' => $courses,
        ]);
    }

    public function search(){
        $keyword = '';
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
        }
        $courses = Courses::where('name', 'LIKE', '%'.$keyword.'%')->get();
        return view('Frontend::courses.search', compact('courses','keyword'));
    }

    public function category($alias)
    {
        $category = Categories::where(['alias'=>$alias])->first();
        $courses = $category
            ->courses()
            ->where('courses.status', 'active')
            ->get();

        return view('Frontend::courses.category',compact('courses','category'));
    }

    public function view($alias)
    {
        $lesson = null;
        $paramsVideo = null;
        $course = Courses::with('lessons')->where(['alias'=>$alias])->first();
        $related_courses = Courses::whereHas('categories', function($query) use($course)
        {
            $query->where('courses.id','IN', [1,2,3]);
        })->whereNotIn('alias', [$course->alias])->get();
        if (!empty($course)) {
            if (isset($params['lesson']) && !empty($params['lesson'])) {
                $lesson = $course->lessons()
                    ->find($params['lesson']);
            }

            if (!empty($course->video_type) && !empty($course->video_link) && 'link' == $course->video_type) {
                $paramsVideo = [
                    'isLink' => true,
                    'data' => $this->embedHandleVideo($course->video_link),
                ];
            } else {
                $paramsVideo = [
                    'isLink' => false,
                    'data' => array('disk' => $this->path['course']['video'], 'fileName' => $course->video),
                ];
            }

            $sections = $course->sections()
                ->orderBy('id', 'ASC')
                ->get();
            $video = empty($paramsVideo) ? null : ($paramsVideo['isLink'] ? array('name' => '', 'isLink' => $paramsVideo['isLink'], 'link' => $paramsVideo['data']) : array('name' => $course->video, 'isLink' => $paramsVideo['isLink'], 'link' => URL::action('\Backend\Controllers\BaseController@streamFile', $paramsVideo['data'])));
            return view('Frontend::courses.view', compact('course', 'sections', 'lesson', 'video', 'attach','related_courses'));
        }
    }

    /**
     * Detail the course learning
     * If isset course return view detail the course learn
     * If empty course redirect 404 page or index course page
     *
     * @param {integer} $id, {Illuminate\Http\Request} $request
     * @return view
     **/
    public function learn($alias, Request $request)
    {
        $params = $request->all();
        $lesson = null;
        $paramsVideo = null;
        $course = null;
        $course = Courses::with('lessons')->where(['alias'=>$alias])->first();

        if (!empty($course)) {
            $params = $request->all();

            if (isset($params['lesson']) && !empty($params['lesson'])) {
                $lesson = $course->lessons()
                    ->find($params['lesson']);
            }

            // if (!empty($lesson) && !empty($lesson->video)) {
            //     $paramsVideo = array('disk' => $this->path['lesson']['video'], 'fileName' => $lesson->video);
            // } else {

            // }

            if (!empty($lesson->video_type) && !empty($lesson->video_link) && 'link' == $lesson->video_type) {
                $paramsVideo = [
                    'isLink'=> true,
                    'data' => $this->embedHandleVideo($lesson->video_link),
                ];
            } else if (!empty($lesson->video) && !empty($lesson->video) && 'upload' == $lesson->video_type){
                $paramsVideo = [
                    'isLink'=> false,
                    'data' => array('disk' => $this->path['lesson']['video'], 'fileName' => $lesson->video),
                ];

            } else if (!empty($course->video)) {
                $paramsVideo = [
                    'isLink'=> false,
                    'data' => array('disk' => $this->path['course']['video'], 'fileName' => $course->video),
                ];
            }

            $paramsAttach = (!empty($lesson) && !empty($lesson->attach)) ? array('disk' => $this->path['lesson']['attach'], 'fileName' => $lesson->attach) : null;
            // If isExams or question_limit > 0 then random exams
            $randomExams= null;
            if (!empty($lesson) && (0 < $lesson->question_limit)) {
                // check isExams
                $randomExams = (1 == $lesson->exams) ?
                    $this->randomExams($course->author_id,  $lesson->question_limit, array(['key' => 'type_course', 'operation' => '=', 'value' => $course->id],)) :
                    $this->randomExams($course->author_id,  $lesson->question_limit, array(['key' => 'type_lession', 'operation' => '=', 'value' => $lesson->id],));
            }


            $sections = $course->sections()
                            ->orderBy('id', 'ASC')
                            ->get();
            $video = (!isset($paramsVideo) || empty($paramsVideo)) ? null : ($paramsVideo['isLink'] ? array('name'=>'', 'isLink'=> $paramsVideo['isLink'], 'link'=>$paramsVideo['data']) : array('name' => '', 'isLink'=> $paramsVideo['isLink'], 'link' => URL::action('\Backend\Controllers\BaseController@streamFile', $paramsVideo['data'])));

            $attach = (!isset($paramsAttach) || empty($paramsAttach)) ? null : array('name' => $lesson->attach, 'link' => URL::action('\Frontend\Controllers\BaseController@downloadFile', $paramsAttach));
            $exams = (!isset($randomExams) || empty($randomExams)) ? null : $randomExams;

            return view('Frontend::courses.learn', compact('course', 'sections', 'lesson', 'video', 'attach', 'exams', 'params'))->withHeader('X-Frame-Options', 'ALLOWALL');
        }

//        return redirect()->action('Frontend\Controllers\CourseController@view');
    }

    /**
     * Gets the Vimeo ID from a youtube URL.
     * This field will accept YouTube URLs of the following formats:
     * http://youtube.com/watch?v=[video_id]
     * http://youtu.be/[video_id]
     * http://youtube.com/v/[video_id]
     * http://youtube.com/embed/[video_id]
     * http://youtube.com/?v=[video_id]
     * All formats listed above can also be provided without 'http://', with 'www.', or with 'https://' rather than 'http://'.
     *
     * @param $url
     *
     * @return string
     * The numeric ID as a string.
     */
    private function getYouTubeVideoId($url)
    {
        // See README.txt for accepted URL formats.
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'<> #]+)/", $url, $matches);

        if (!empty($matches[1])) {
            $video_id = $matches[1];
            return $video_id;
        }

        return FALSE;
    }

    /**
     * Gets the Vimeo ID from a vimeo.com URL.
     *
     * @param $url String
     *
     * @return String
     *   The numeric ID as a string.
     */
    private function getVimeoVideoId($url)
    {
        preg_match('@(http|https)://(www\.)?vimeo\.com/.*?([0-9]+)@', $url, $matches);

        if (isset($matches[3])){

            return array ('protocol' => $matches[1], 'id' => $matches[3]);
        }

        return FALSE;
    }

    /**
     * Helper function to get the Facebook video's id.
     *
     * @param string $url
     *   The video URL.
     *
     * @return string|bool
     *   The video ID, or FALSE in case the ID can't be retrieved from the URL.
     */
    private function getFacebookVideoId($url) {
        // Parse_url is an easy way to break a url into its components.
        $matches = array();
        preg_match('/(?:.*)(?:v=|video_id=|videos\/|videos\/v.\.\d+\/)(\d+).*/', $url, $matches);

        // If the v or video_id get parameters are set, return it.
        if ($matches && !empty($matches[1])) {
        return $matches[1];
        }
        // Otherwise return false.
        return FALSE;
    }

    /**
     * Render as <iframe>s for the video link formatter.
     *
     * @param $url
     *
     * @return {string} iframe html
     */
    private function embedHandleVideo($url)
    {
        if (!empty($url)) {
            $src = '';
            $iframeFacebook = '//www.facebook.com/video/embed?video_id=';
            $iframeVimeo = '://player.vimeo.com/video/';
            $iframeYoutube = '//www.youtube.com/embed/';


            if ($this->getYouTubeVideoId($url)) {
                $src = $iframeYoutube . $this->getYouTubeVideoId($url);
            }
            else if ($this->getVimeoVideoId($url)) {
                $vimeo = $this->getVimeoVideoId($url);
                $src = $vimeo['protocol'] . $iframeVimeo . $vimeo['id'];
            }
            else if ($this->getFacebookVideoId($url)) {
                $src = $iframeFacebook . $this->getFacebookVideoId($url);
            }

            return '<iframe class="@class" src="' . $src . '" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ';
        }

        return '';
    }

}
