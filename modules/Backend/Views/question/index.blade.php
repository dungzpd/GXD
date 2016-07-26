@extends('Backend::layouts.default')

@section('title', Lang::get('question.list'))

@section('content')

{!! Breadcrumbs::render('question') !!}
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('question.question')</h3>

                    <div class="box-tools pull-right">
                        <form action="{!! URL::action('\Backend\Controllers\QuestionController@index') !!}" method="post">
                            {!! csrf_field(csrf_token()) !!}  
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="@lang('question.search')" value="{!! isset($keyword) ? $keyword : '' !!}">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </form>                        
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls series-action-top">
                        <!-- Check all button -->       
                        <a href="{!! URL::action('\Backend\Controllers\QuestionController@create') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\QuestionController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>                        
                        <a href="{!! URL::action('\Backend\Controllers\QuestionController@index') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>
                        <div class="pull-right">                            
                            @include('Backend::layouts.partials.pagination', array('data' => $obj))
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <div class="table-list overflow-hidden">
                        <div class="row-group header-list">
                            <div class="row item">
                                <div class="col-md-12">
                                    <div class="col-md-1 padding-left-5">                                        
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                                    </div>
                                    <div class="col-md-7">
                                        @lang('question.question')                                         
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\QuestionController@index', 'field' => 'question', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>   
                                    <div class="col-md-2">
                                        @lang('question.author')                                         
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\QuestionController@index', 'field' => 'author', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>     
                                    <div class="col-md-2">
                                        @lang('question.actions')
                                    </div> 
                                </div>
                            </div>      
                        </div>

                        <div class="row-group content-list">
                            @if(!empty($obj)) 
                                @foreach($obj as $item)
                                    <div class="row item">
                                        <div class="col-md-12">
                                            <div class="col-md-1 padding-left-10">
                                                <input type="checkbox">                                                
                                            </div>
                                            <div class="col-md-7">
                                                <a href="{!! URL::action('\Backend\Controllers\QuestionController@edit', array('id' => $item->id))!!}">
                                                    <div class="question-content">
                                                        {!! $item->question !!}                               
                                                    </div>
                                                </a>
                                            </div>              
                                            <div class="col-md-2">                                                
                                                {!! $item->author->name or '' !!}
                                            </div> 
                                            <div class="col-md-2">
                                                <a href="{!! URL::action('\Backend\Controllers\QuestionController@status', array('id' => $item->id)) !!}">
                                                    <button type="button" class="btn btn-{!! $item->status != 'inactive' ? 'info' : 'warning' !!} btn-sm"><i class="fa fa-toggle-{!! $item->status != 'inactive' ? 'on' : 'off' !!}"></i></button>                                         
                                                </a> 
                                                <a href="{!! URL::action('\Backend\Controllers\QuestionController@edit', array('id' => $item->id)) !!}">
                                                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="{!! URL::action('\Backend\Controllers\QuestionController@delete', array('id' => $item->id, 'currentPage' => $obj->currentPage())) !!}">
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>   
                                                </a>                          
                                            </div> 
                                        </div>
                                    </div>  
                                @endforeach
                            @endif                         
                        </div>

                        <div class="row-group footer-list"></div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls series-action-bottom">
                        <a href="{!! URL::action('\Backend\Controllers\QuestionController@create') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\QuestionController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>                        
                        <a href="{!! URL::action('\Backend\Controllers\QuestionController@index') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>                        
                        <div class="pull-right">
                            @include('Backend::layouts.partials.pagination', array('data' => $obj))
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->



    </div>
</section>

@stop