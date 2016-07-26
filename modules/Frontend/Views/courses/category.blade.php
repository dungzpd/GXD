@extends('Frontend::layouts.default')

@section('title', Lang::get('courses.courses'))

@section('content')
    {!! Breadcrumbs::setView('Frontend::layouts.partials.breadcrumb') !!}
    {!! Breadcrumbs::render('f_courses.category',$category) !!}
    <div class="main-content">
        <div class="container">
            <div class="row">
                @include('Frontend::layouts.partials.sidebar')
                <div class="col-sm-9">
                    <h1 class="page-title">{!! $category->name !!}</h1>
                    <div class="row list-courses-item">
                        @foreach($courses as $course)
                            <div class="col-sm-4 course-item">
                                @include('Frontend::courses._courses_item', ['data' => $course])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
