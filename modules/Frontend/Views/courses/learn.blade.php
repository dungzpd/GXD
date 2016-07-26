@extends('Frontend::layouts.default')

@section('title', Lang::get('courses.courses'))

@include('Frontend::courses.scripts')

@section('content')
    {!! Breadcrumbs::setView('Frontend::layouts.partials.breadcrumb') !!}
    {!! Breadcrumbs::render('f_courses.view',$course) !!}
    <div class="main-content">
        <div class="container">

            <div class="content-courses">
                <div class="row header-courses">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                        <h1 class="title-page">{!! $course->name !!}</h1>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" style="width: 35%">
                                <span class="sr-only">35% Hoàn thành</span>
                            </div>
                            <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%">
                                <span class="sr-only">20% Hoàn thành</span>
                            </div>
                            <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: 10%">
                                <span class="sr-only">10% Hoàn thành</span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#content" class="active" role="tab"
                                          data-toggle="tab">@lang('courses.detailLesson')</a></li>
                    <li><a href="#document" role="tab" data-toggle="tab">@lang('courses.document')</a></li>
                    <li><a href="#test" role="tab" data-toggle="tab">@lang('courses.exams')</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="content">
                        <h2>@lang('courses.detailLesson')</h2>
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
                                                            <a href="?lesson={!! $lesson->id !!}">
                                                                <i class="fa fa-play-circle-o icon margin-right-10"></i>
                                                                {!! $lesson->name !!}
                                                            </a>
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
                    <div class="tab-pane fade" id="document">
                        <h2>@lang('courses.document')</h2>
                        <div class="list-files">
                            @if (!empty($attach))
                                <a href="{!! $attach['link'] !!}">
                                    <i class="fa fa-file-text icon margin-right-10" aria-hidden="true"></i>
                                    {!! $attach['name'] !!}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="test">
                        <h2>@lang('courses.exams')</h2>
                        <div class="content-exams">
                            @include('Frontend::courses._exams', [
                            'exams' => !empty($exams) ? $exams->get() : null,
                            'extra' => [
                            'teacher_id' => isset($course->author_id) ? $course->author_id: null,
                            'course_id' => isset($course->id) ? $course->id : null,
                            'lesson_id' => isset($lesson->id) ? $lesson->id: null]])
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
