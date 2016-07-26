@extends('Backend::layouts.default')

@section('title', Lang::get('lesson.lesson'))

@section('content')

{!! Breadcrumbs::render('lessons') !!}
<!-- Main content -->
<section class="content">
    <div class="row">
    <!-- .col -->
    <div class="col-md-12">
    <!-- .message -->
    @if ($sttShare)
    <div class="alert alert-success text-center" role="alert">
        <i class="fa fa-check color-white"></i>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @lang('lesson.shareSuccess')
    </div>
    @endif
    <!-- /.message -->

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#tab-lessons" data-toggle="tab">@lang('lesson.list')</a></li>
        <li role="presentation"><a href="#tab-lessons-shared" data-toggle="tab">@lang('lesson.listShared')</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" id="tab-lessons" class="tab-pane active box no-border">
            @include('Backend::lesson.grid', array('lessons' => $lessons, 'users' =>$users, 'showActionColumn' => true, 'showStatus' => true, 'showAdd' => true, 'showEdit' => true, 'showShare' => true, 'showDel' => true))
        </div>
        <div role="tabpanel" id="tab-lessons-shared" class="tab-pane box no-border">
            @include('Backend::lesson.grid', array('lessons' => $lessonsShared, 'showActionColumn' => true, 'showStatus' => false, 'showAdd' => false, 'showEdit' => false, 'showShare' => false, 'showDel' => false))
        </div>
    </div> 
        
    </div>
    <!-- /.col -->
    </div>
</section>

@stop