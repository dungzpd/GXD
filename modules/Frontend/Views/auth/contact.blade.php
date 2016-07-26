@extends('Frontend::layouts.default')

@section('title', Lang::get('courses.courses'))

@section('content')
    {!! Breadcrumbs::setView('Frontend::layouts.partials.breadcrumb') !!}
    {!! Breadcrumbs::render('contact') !!}
    <div class="main-content">
        <div class="container">
            <h1 class="page-title">Liên hệ</h1>
            <div class="content-page">
                <p>Địa chỉ: Toà nhà số 2A/55, Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội</p>
                <p>Tel: 04.3 5682482, Mobi: 0985 099 938 (Ms Thu An)</p>
                <p>Email: <a href="mailto:phanmem@giaxaydung.com">phanmem@giaxaydung.com</a> </p>
            </div>
        </div>
    </div>

@stop
