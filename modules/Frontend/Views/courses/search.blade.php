@extends('Frontend::layouts.default')

@section('title', Lang::get('courses.courses'))

@section('content')
    {!! Breadcrumbs::setView('Frontend::layouts.partials.breadcrumb') !!}
    {!! Breadcrumbs::render('search') !!}
    <div class="main-content">
        <div class="container">
            <div class="row">
                @include('Frontend::layouts.partials.sidebar')
                <div class="col-sm-9">
                    <h1 class="page-title">Tìm kiếm</h1>
                   @if($courses == null || empty($courses))
                       <p>Không có kết quả nào</p>
                   @else
                        <p> {!! 'Kết quả tìm kiếm cho: <b>'.$keyword.'</b>' !!}</p>
                        <div class="row list-courses-item">
                            @foreach($courses as $course)
                                <div class="col-sm-4 course-item">
                                    @include('Frontend::courses._courses_item', ['data' => $course])
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop
