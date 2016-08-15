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
                    <h3 class="box-title">@lang('customers.account')</h3>

                    <div class="box-tools pull-right">
                        <form action="{!! URL::action('\Backend\Controllers\CustomersController@index') !!}" method="post">
                            {!! csrf_field(csrf_token()) !!}  
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" name="keyword" placeholder="@lang('customers.searchAccount')" value="{!! isset($keyword) ? $keyword : '' !!}">
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
                    </div>
                    <div class="table-list overflow-hidden">
                        <div class="row-group header-list">
                            <div class="row item">
                                <div class="col-md-12">
                                    <div class="col-md-1 padding-left-5">                                        
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                                    </div>
                                    <div class="col-md-2">
                                        @lang('customers.username')                                         
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'name', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>     
                                     
                                    <div class="col-md-3">
                                        @lang('customers.email')
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'email', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        @lang('customers.phone')
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'role', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        @lang('customers.note') 
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'status', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>    
                                    <div class="col-md-2">
                                        @lang('customers.status') 
                                        {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CustomersController@index', 'field' => 'status', 'sort' => $sort, 'field_vs' => $field]) !!}
                                    </div>  
                                </div>
                            </div>      
                        </div>
                        
                        <div class="row-group content-list">
                            @if(!empty($customer)) 
                                @foreach($customer as $customers)
                                    <div class="row item">
                                        <div class="col-md-12">
                                            <div class="col-md-1 padding-left-10">
                                                <input type="checkbox"
                                                    init="iCheck"
                                                    data-icheck-class="icheckbox_flat-blue"
                                                    data-increase-area="20%">                                                
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{!! URL::action('\Backend\Controllers\CustomersController@edit', array('id' => $customers->id))!!}">
                                                    {!! $customers->name !!}                               
                                                </a>
                                            </div>      
                                            
                                            <div class="col-md-3">
                                                {!! $customers->phone !!}                                
                                            </div>
                                            <div class="col-md-2">
                                                {!! $customers->email !!}                               
                                            </div>
                                            <div class="col-md-2">
                                                {!! $customers->note !!}                               
                                            </div>
                                    
                                            <div class="col-md-2">
                                                <a href="{!! URL::action('\Backend\Controllers\CustomersController@edit', array('id' => $customers->id)) !!}">
                                                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                                </a>
                                               
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>   
                                                                          
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