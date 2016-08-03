@extends('Backend::layouts.default')

@section('title', Lang::get('customers.list'))

@section('content')

{!! Breadcrumbs::render('account') !!}
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('user.account')</h3>

                    <div class="box-tools pull-right">
                        <form action="{!! URL::action('\Backend\Controllers\CustomersController@index') !!}" method="post">
                            {!! csrf_field(csrf_token()) !!}  
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="@lang('user.searchAccount')" value="{!! isset($keyword) ? $keyword : '' !!}">
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
                        <a href="{!! URL::action('\Backend\Controllers\CustomersController@create') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\CustomersController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>                        
                        <a href="{!! URL::action('\Backend\Controllers\CustomersController@index') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>
                        <div class="pull-right">                            
                            @include('Backend::layouts.partials.pagination', array('data' => $users))
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
                                    <div class="col-md-2">
                                        @lang('user.username')                                         
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'username', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>                                    
                                    <div class="col-md-3">
                                        @lang('user.email')
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'email', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        @lang('user.role')
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'role', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        @lang('user.status') 
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'status', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>    
                                    <div class="col-md-2">
                                        @lang('user.actions')
                                    </div> 
                                </div>
                            </div>      
                        </div>

                        <div class="row-group content-list">
                            @if(!empty($users)) 
                                @foreach($users as $user)
                                    <div class="row item">
                                        <div class="col-md-12">
                                            <div class="col-md-1 padding-left-10">
                                                <input type="checkbox"
                                                    init="iCheck"
                                                    data-icheck-class="icheckbox_flat-blue"
                                                    data-increase-area="20%">                                                
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{!! URL::action('\Backend\Controllers\CustomersController@edit', array('id' => $user->id))!!}">
                                                    {!! $user->username !!}                               
                                                </a>
                                            </div>                                            
                                            <div class="col-md-3">
                                                {!! $user->email !!}                                
                                            </div>
                                            <div class="col-md-2">
                                                @lang('user.'.$user->role->name)                             
                                            </div>
                                            <div class="col-md-2">                                                       
                                                <a href="{!! URL::action('\Backend\Controllers\CustomersController@status', array('id' => $user->id)) !!}">
                                                    <button type="button" class="btn btn-{!! $user->status > 0 ? 'info' : 'warning' !!} btn-sm"><i class="fa fa-toggle-{!! $user->status > 0 ? 'on' : 'off' !!}"></i></button>                                         
                                                </a>                                                
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{!! URL::action('\Backend\Controllers\CustomersController@edit', array('id' => $user->id)) !!}">
                                                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="{!! URL::action('\Backend\Controllers\CustomersController@delete', array('id' => $user->id, 'currentPage' => $users->currentPage())) !!}">
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
                        <a href="{!! URL::action('\Backend\Controllers\CustomersController@create') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\CustomersController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>                        
                        <a href="{!! URL::action('\Backend\Controllers\CustomersController@index') !!}">
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>                        
                        <div class="pull-right">
                            @include('Backend::layouts.partials.pagination', array('data' => $users))
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