@extends('Frontend::layouts.default')

@section('title', Lang::get('courses.courses'))

@section('content')
    {!! Breadcrumbs::setView('Frontend::layouts.partials.breadcrumb') !!}
    {!! Breadcrumbs::render('teacher') !!}
    <div class="main-content">
        <div class="container">
            <h1 class="page-title">Giảng viên</h1>
            <div class="row list-teacher">
                @foreach($list_teacher as $teacher)
                <div class="col-sm-3 teacher-item">
                    <div class="teacher-item-wrap">
                        <div class="teacher-image">
                            <a href="{!! URL::to('/user/profile',['id'=>($teacher->id)]) !!}" class="relative">
                                <img src="{!! asset($teacher->avatar) !!}">
                            </a>
                        </div>
                        <div class="teacher-des">
                            <h4>
                                <a href="{!! URL::to('/user/profile',['id'=>($teacher->id)]) !!}">
                                    {!! $teacher->name !!}
                                </a>
                            </h4>
                            <p class="teacher-position">{!! $teacher->provider !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@stop
