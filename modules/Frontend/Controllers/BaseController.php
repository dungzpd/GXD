<?php

namespace Frontend\Controllers;

use Alloy\Models\Questions;
use Alloy\Facades\Run;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Mockery\CountValidator\Exception;

class BaseController extends Controller
{

    /**
     * Protected function random exams
     *
     * @param {integer} $limit, {Array} $author
     * @return {Illuminate\Http\Response} $questions
     **/
    protected function randomExams($author = null, $limit = 0, $params = array())
    {
        $questions = null;
        if (!empty($author)) {
            $questions = Questions::where('author_id', '=', $author);

            try {
                if (!empty($params)) {
                    $questions->where(function ($query) use ($params) {
                        foreach ($params as $param) {
                            $query->where($param['key'], $param['operation'], $param['value']);
                        }
                    });
                }
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        $count = $questions->count();
        if (0 == $count) {
            return null;
        }
        $limit = ($limit > $count) ? $count : $limit;
        $questions->get()->random($limit);

        return $questions;
    }

    /**
     * Public function download file
     *
     * @param {string} $disk, {string} $fileName
     * @return {Illuminate\Http\Response} download
     *
     **/
    public function downloadFile($disk, $fileName)
    {
        $file = null;
        $path = null;

        if (!empty($disk) && !empty($fileName)) {
            if (Storage::disk(Run::disk($disk))->has($fileName)) {
                //$path = storage_path('app\\' . str_replace('-', '\\', $disk) . '\\' . $fileName);
                $storagePath = Storage::disk(Run::disk($disk))->getDriver()->getAdapter()->getPathPrefix();
                $path = $storagePath . $fileName;
            }
        }

        return response()->download($path, $fileName);
    }


}
