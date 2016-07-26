@extends('Frontend::layouts.default')

@section('title', Lang::get('courses.courses'))

@section('content')
    {!! Breadcrumbs::setView('Frontend::layouts.partials.breadcrumb') !!}
    {!! Breadcrumbs::render('f_courses.view',$course) !!}
    <div class="main-content single-page">
        <div class="container">
            <h1 class="title-page">{!! $course->name !!}</h1>
            <div class="rate" data-score="{!! $course->rate !!}"></div>
            <div class="course-category">
                <p>Giảng viên :
                    <a href="{!! URL::to('/user/profile',['id'=>($course->teacher->id)]) !!}">
                        {!! $course->teacher->name !!}
                    </a>
                </p>
                <p>
                    <a href="">
                        {!! $course->teacher->provider !!}
                    </a>
                </p>
            </div>
            <div class="row">
                <div class="col-sm-8 single-courses-video">
                    @if (!empty($video))
                        <div class="embed-responsive embed-responsive-16by9">
                            @if($video['isLink'])
                                {!! $video['link'] !!}
                            @else
                                <video src="{!! $video['link'] !!}" controls autoplay>
                                    <source src="{!! $video['link'] !!}"></source>
                                    Sorry, your browser doesn't support embedded videos,
                                    but don't worry, you can <a href="#">download it</a>
                                    and watch it with your favorite video player!
                                </video>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="col-sm-4 single-courses-description">
                    <div class="courses-price">
                        <p class="sale-price">
                            @if($course->sell_price > 0)
                                {!! number_format($course->sell_price) !!} ₫
                            @elseif($course->price>0)
                                {!! number_format($course->price) !!}
                            @else
                                Miễn phí
                            @endif
                        </p>
                        <p class="regular-price">
                            @if($course->sell_price > 0)
                                <del>{!! number_format($course->price) !!} ₫</del>
                            @endif
                        </p>
                        @if(!Auth::check())
                            <a class="btn btn-lg btn-danger" data-toggle="modal" href="#login">Bắt đầu học</a>
                        @else
                            <a class="btn btn-lg btn-danger"
                               href="{!! URL::to('courses\learn',['alias'=>$course->alias]) !!}">
                                Bắt đầu học
                            </a>
                        @endif
                    </div>
                    <div class="course-des">
                        <p>Thời lượng: <b>{!! $course->duration !!} phút</b></p>
                        <p>Bài giảng: <b>{!! count($course->lessons) !!} Bài học</b></p>
                        <p><b>Cấp chứng chỉ hoàn thành</b></p>
                        <p><b>{!! $course->learned > 0 ?$course->learned:'0' !!} học viên đã học</b></p>
                    </div>
                    <div class="social-like-share">
                        <div class="facebook-button fleft">
                            <div id="fb-root"></div>
                            <div class="fb-like" data-href="" data-layout="button" data-action="like" data-size="large"
                                 data-show-faces="false" data-share="true"></div>
                        </div>
                        <div class="google-button fleft">
                            <div class="g-plusone" data-size="medium"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 course-nav-bar">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <a href="#course-info" role="tab" data-toggle="tab">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="#curriculum" role="tab" data-toggle="tab">Bài học</a>
                        </li>
                        <li>
                            <a href="#teacher" role="tab" data-toggle="tab">Giảng viên</a>
                        </li>
                        <li>
                            <a href="#reviews" role="tab" data-toggle="tab">Đánh giá</a>
                        </li>
                        <li>
                            <a href="#version" role="tab" data-toggle="tab">Phiên bản</a>
                        </li>
                    </ul>


                </div>
                <div class="col-sm-9 course-detail">
                    <div class="tab-content">
                        <div class="course-detail-item active tab-pane fade in" id="course-info">
                            <h3>Giới thiệu</h3>
                            <div class="detail-content">
                                {!! $course->detail !!}
                            </div>
                        </div>
                        <div class="course-detail-item tab-pane fade" id="curriculum">
                            <h3>
                                học</h3>
                            <div class="detail-content">
                                <!-- .list-section -->
                                <div class="list-section">
                                    @if (!empty($sections))
                                        @foreach($sections as $id => $section)
                                            <div class="panel panel-info section-item">
                                                <!-- .panel-heading -->
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{!! $section->name or $section->id !!}</h3>
                                                </div>
                                                <!-- /.panel-heading -->
                                                <!-- .panel-body -->
                                                <div class="panel-body">
                                                    <ul>
                                                        @if(!empty($section->lessons) && count($section->lessons) > 0)
                                                            @foreach($section->lessons as $lesson)
                                                                <li>
                                                                    <i class="fa fa-play-circle-o icon margin-right-10"></i>
                                                                    {!! $lesson->name !!}
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!-- /.list-section -->
                            </div>
                        </div>
                        <div class="course-detail-item tab-pane fade" id="teacher">
                            <h3>Giảng viên</h3>
                            <div class="detail-content">
                                <div class="teacher-des">
                                    <img class="fleft img-teacher" src="{!! asset($course->teacher->avatar) !!}">
                                    <div class="fleft social">
                                        <div class="teaher-position">
                                            <a href="{!! URL::to('user\profile',['id'=>$course->teacher->id]) !!}">
                                                {!! $course->teacher->name !!}
                                            </a>
                                            {!! $course->teacher->provider !!}
                                        </div>
                                        <ul>
                                            <li>
                                                <a><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a><i class="fa fa-youtube"></i></a>
                                            </li>
                                            <li>
                                                <a><i class="fa fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="course-detail-item tab-pane fade" id="reviews">
                            <h3>Đánh giá</h3>
                            <div class="comment">
                                <div style="width:100%">
                                    <div class="fb-comments" data-href="{!! Request::url() !!}" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="course-detail-item tab-pane fade" id="version">
                            <h3>Phiên bản</h3>
                            <div class="version-content">
                                {!! $course->version !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 related-course">
                    <div class="row list-related-item">
                        @foreach($related_courses as $related_course)
                            <div class="related-course-item">
                                <div class="col-sm-3 img-courses">
                                    <a href="{!! URL::to('/courses/view',['alias'=>$related_course->alias]) !!}">
                                        <img src="{!! $related_course->getImage('courses',$related_course->image,380,250) !!}">
                                    </a>
                                </div>
                                <div class="col-sm-9 courses-des">
                                    <h3>
                                        <a href="{!! URL::to('/courses/view',['id'=>$data->id]) !!}">{!! $data->name !!}</a>
                                    </h3>
                                    <div class="rate" data-score="{!! $data->rate !!}"></div>
                                    <div class="course-price">
                                        <p class="sale-price">
                                            @if($data->sell_price > 0)
                                                {!! number_format($data->sell_price) !!} ₫
                                            @elseif($data->price>0)
                                                {!! number_format($data->price) !!}
                                            @else
                                                Miễn phí
                                            @endif
                                        </p>
                                        <p class="regular-price">
                                            @if($data->sell_price > 0)
                                                <del>{!! number_format($data->price) !!} ₫</del>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
