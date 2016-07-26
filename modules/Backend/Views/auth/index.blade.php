@extends('Backend::layouts.default')

@section('title', Lang::get('common.dashboard'))

@section('content')

<!-- Main content -->
<section class="content">
    {!! Breadcrumbs::render('dashboard') !!}
    
    <h1>{!! Alloy\Facades\Translation::En('Dashboard page') !!}</h1>

</section>

@stop