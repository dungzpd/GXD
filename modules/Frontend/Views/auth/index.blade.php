@extends('Frontend::layouts.default')

@section('content')

    <div class="home-search paralax text-center">
        <div class="container">
            <div class="row search-form">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2>Tìm Kiếm Khóa Học</h2>
                    <h3>Học và thi Trực tuyến</h3>
                    <form action="{!! URL::to('/courses/search') !!}">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="keyword" placeholder="Nhập tên khóa học ...">
                            <span class="input-group-btn">
                                <button class="btn btn-default input-lg" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                </div>
            </div>
            <!--<div class="row list-utilities">
                <div class="col-sm-3 utility-item">
                    <h3>Khóa Học</h3>
                    <p>Học và thi trực tuyến, tiết kiệm thời gian, học ở mọi nơi</p>
                </div>
                <div class="col-sm-3 utility-item">
                    <h3>Bài giảng</h3>
                    <p>Bài giảng phong phú</p>
                </div>
                <div class="col-sm-3 utility-item">
                    <h3>Giảng viên</h3>
                    <p>Đội ngũ giảng viên giàu kinh nghiệm</p>
                </div>
                <div class="col-sm-3 utility-item">
                    <h3>Thư Viện</h3>
                    <p>Thư viện bài giảng phong phú</p>
                </div>
            </div>-->
        </div>
    </div>
    <div class="list-top-courses block text-center">
        <div class="container">
            <h2 class="title-block">Khóa học nổi bật</h2>
            <div class="row list-courses-item">
                @foreach($courses as $course)
                <div class="col-sm-3 course-item">
                    @include('Frontend::courses._courses_item', ['data' => $course])
                </div>
                @endforeach
                <div class="col-sm-12">
                    <a href="{!! URL::action('\Frontend\Controllers\CourseController@index') !!}" class="btn btn-success btn-lg">Tất cả khóa học</a>
                </div>
            </div>
        </div>
    </div>
    <div class="list-counter block paralax text-center">
        <div class="container">
            <h2 class="title-block">Học viên nổi bật</h2>
            <div class="row list-counter-item">
                @foreach($list_student as $student)
                <div class="col-sm-3 col-xs-6 student-item">
                    <div class="image-student">
                        <a href="{!! URL::action('\Frontend\Controllers\UserController@profile',['id'=>$student->id]) !!}">
                            <img src="{!! asset($student->avatar) !!}">
                        </a>
                    </div>
                    <p>{!! $student->name !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="list-top-courses block text-center">
        <div class="container">
            <h2 class="title-block">Khóa học miễn phí</h2>
            <div class="row list-courses-item">
                @foreach($courses_frees as $course_free)
                <div class="col-sm-3 course-item">
                    @include('Frontend::courses._courses_item', ['data' => $course_free])
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="certificate paralax block text-center">
        <div class="container">
            <h2 class="title-block">Chứng nhận</h2>
            <div class="row list-certificate">
                @foreach($certificates as $certificate)
                <div class="col-sm-3">
                    <img src="http://demo.thuchapro.com/timthumb.php?src=http://demo.thuchapro.com/images/cf_<?=$i?>.jpg&w=265&h=185&zc=1">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="our-teacher block text-center">
        <div class="container">
            <h2 class="title-block">Giảng Viên</h2>
            <div class="row list-teacher-item">
                @foreach($list_teacher as $teacher)
                <div class="col-sm-3 teacher-item">
                    <div class="teacher-wrap">
                        <div class="teacher-image">
                            <a href="{!! URL::to('/user/profile',['id'=>$teacher->id]) !!}">
                                <img src="{!! asset($teacher->avatar) !!}">
                            </a>
                        </div>
                        <div class="teacher-info">
                            <h4><a href="{!! URL::to('/user/profile',['id'=>$teacher->id]) !!}">{!! $teacher->name !!}</a></h4>
                            <p>{!! $teacher->provider !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


@stop
