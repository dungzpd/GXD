@extends('Backend::layouts.default')

@section('title', Lang::get('products.list'))
die('alkdjsflkasdjflsakdjflasdfjasldkfjsaldfjaslkdfjasldkfjasl;df');
@section('content')

{!! Breadcrumbs::render('courses') !!}

<div class="content">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('products.products')</h3>

                    <div class="box-tools pull-right">
                        <form action="{!! URL::action('\Backend\Controllers\ProductController@index') !!}" method="get">
                            @if (!empty($categories))
                                <div class="has-feedback">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6 no-padding">
                                            <select name="category" class="form-control  input-sm">
                                                @foreach($categories as $c)
                                                    <option value="{!! $c->id !!}"
                                                            @if (isset($category) && ($category == $c->id))
                                                            selected="selected"
                                                            @endif>{!! $c->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 no-padding">
                                            <input type="text" class="form-control input-sm" name="keyword" placeholder="@lang('courses.search')" value="{!! isset($keyword) ? $keyword : '' !!}">
                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                        </div>
                                    </div>
                            @endif

                            </div>
                        </form>                        
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls series-action-top">
                        <!-- Check all button -->       
                        <a href="{!! URL::action('\Backend\Controllers\ProductController@create') !!}">
                            <button type="button"
                                    init="tooltip"
                                    title="@lang('courses.add')"
                                    class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </a>
                        <button type="button"
                                class="btn btn-danger btn-sm"
                                init="tooltip"
                                title="@lang('courses.delete')"
                                data-link="{!! URL::action('\Backend\Controllers\ProductController@deleteMultiple') !!}">
                            <i class="fa fa-trash"></i>
                        </button>
                        <a href="{!! URL::action('\Backend\Controllers\ProductController@index') !!}">
                            <button type="button"
                                    init="tooltip"
                                    title="@lang('courses.reload')"
                                    class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>
                        <div class="pull-right"> 
                            @if(!empty($list)) 
                                @include('Backend::layouts.partials.pagination', array('data' => $list))
                            @endif
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
                                    <div class="col-md-1">
                                        @lang('courses.mkh')
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\ProductController@index', 'field' => 'id', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>
                                    <div class="col-md-4">
                                        @lang('courses.name')                                         
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\ProductController@index', 'field' => 'name', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>                                    
                                    <div class="col-md-2">
                                        @lang('courses.price')
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\ProductController@index', 'field' => 'price', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        @lang('courses.duration')
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\ProductController@index', 'field' => 'duration', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        @lang('common.functional')
                                    </div>
                                </div>
                            </div>      
                        </div>

                        <div class="row-group content-list">
                            @if(!empty($list)) 
                                @foreach($list as $item)
                                <div class="row item">
                                    <div class="col-md-12">
                                        <div class="col-md-1 padding-left-10">
                                            <input type="checkbox"
                                                init="iCheck"
                                                data-icheck-class="icheckbox_flat-blue"
                                                data-increase-area="20%">                                                
                                        </div>
                                        <div class="col-md-1">
                                            <a href="{!! URL::action('\Backend\Controllers\ProductController@edit', array('id' => $item->id))!!}">
                                                {!! $item->id !!}                               
                                            </a>
                                        </div> 
                                        <div class="col-md-4">
                                            <a href="{!! URL::action('\Backend\Controllers\ProductController@edit', array('id' => $item->id))!!}">
                                                {!! $item->name !!}                               
                                            </a>
                                        </div>                                            
                                        <div class="col-md-2">
                                            {!! $item->price !!}                                
                                        </div>
                                        <div class="col-md-2">
                                            {!! $item->duration !!}                           
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{!! URL::action('\Backend\Controllers\ProductController@status', array('id' => $item->id, 'currentPage' => $list->currentPage())) !!}">
                                                <button type="button"
                                                        init="tooltip"
                                                        title="@lang('common.status')"
                                                        class="btn btn-{!! $item->status == 'active' ? 'info' : 'warning' !!} btn-sm"><i class="fa fa-toggle-{!! $item->status > 0 ? 'on' : 'off' !!}"></i></button>
                                            </a>
                                            <a href="{!! URL::action('\Backend\Controllers\ProductController@edit', array('id' => $item->id)) !!}">
                                                <button type="button" init="tooltip"
                                                        title="@lang('common.edit')"
                                                        class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                            </a>
                                            <a href="{!! URL::action('\Backend\Controllers\ProductController@delete', array('id' => $item->id, 'currentPage' => $list->currentPage())) !!}">
                                                <button type="button"
                                                        init="tooltip"
                                                        title="@lang('common.delete')"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </a>                          
                                        </div> 
                                    </div>
                                </div>  
                                @endforeach
                            @endif
                            @if(empty($list))
                            <div class="row item">
                                <div class="col-md-12 text-center">
                                    @lang('common.data.empty')
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="row-group footer-list"></div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls series-action-bottom">
                        <a href="{!! URL::action('\Backend\Controllers\ProductController@create') !!}">
                            <button type="button"
                                    init="tooltip"
                                    title="@lang('courses.add')"
                                    class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </a>
                        <button type="button"
                                init="tooltip"
                                title="@lang('courses.delete')"
                                class="btn btn-danger btn-sm"
                                data-link="{!! URL::action('\Backend\Controllers\ProductController@deleteMultiple') !!}">
                            <i class="fa fa-trash"></i>
                        </button>
                        <a href="{!! URL::action('\Backend\Controllers\ProductController@index') !!}">
                            <button type="button"
                                    init="tooltip"
                                    title="@lang('courses.reload')"
                                    class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>                        
                        <div class="pull-right">
                            @if(!empty($list)) 
                                @include('Backend::layouts.partials.pagination', array('data' => $list))
                            @endif
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
</div>
@stop