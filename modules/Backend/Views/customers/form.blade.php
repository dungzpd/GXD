@extends('Backend::layouts.default')

@section('title', Lang::get($title))
@include('Backend::customers.scripts')
@section('content')

{!! Breadcrumbs::render($breadcrumbs) !!}
<!-- Main content -->
<section class="content">
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data"> 
            {!! csrf_field(csrf_token()) !!}  
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('customers.enterInfo')</h3>                   
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-list form-horizontal ">
                            <div class="row-group content-list">
                                <div class="box-body">
                                    @if(!empty($messages['errors']['common']))
                                    <div class="form-group">                                        
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger" role="alert">
                                                <i class="fa fa-times-circle-o color-white"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {!! $messages['errors']['common'] !!}
                                            </div>
                                        </div>
                                    </div>                                    
                                    @endif
                                    @if(!empty($messages['success']))
                                    <div class="form-group">                                        
                                        <div class="col-sm-12">
                                            <div class="alert alert-success" role="alert">
                                                <i class="fa fa-check color-white"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {!! $messages['success'] !!}
                                            </div>
                                        </div>
                                    </div>                                    
                                    @endif
                                    <div class="form-group">
                                        <label for="username" class="col-sm-4 control-label">
                                            @lang('customers.username')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>                                          
                                        </label>
                                        <div class="col-sm-5">
                                            @if(!empty($data['username']))
                                                <input type="text" class="form-control" id="username" name="username" placeholder="@lang('user.username')" value="{!! $data['username'] !!}">                                                
                                            @else 
                                                <input type="text" class="form-control" id="username" name="username" placeholder="@lang('user.username')">
                                            @endif      

                                            @if(isset($messages['errors']['username']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['username'][0] !!}</span>
                                            @endif                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label">
                                            @lang('customers.email')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>   
                                        </label>
                                        <div class="col-sm-5">                                            
                                            @if(!empty($data['email']))
                                                <input type="email" class="form-control" id="email" name="email" placeholder="@lang('user.email')" value="{!! $data['email'] !!}">                                               
                                            @else 
                                                <input type="email" class="form-control" id="email" name="email" placeholder="@lang('user.email')">
                                            @endif      

                                            @if(isset($messages['errors']['email']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['email'][0] !!}</span>
                                            @endif       
                                        </div>
                                    </div>
                                    @if($action !== "edit")
                                    <div class="form-group">
                                        <label for="password" class="col-sm-4 control-label">
                                            @lang('customers.phone')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>   
                                        </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="password" name="phone" placeholder="@lang('customers.phone')">
                                            
                                            @if(isset($messages['errors']['phone']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['phone'][0] !!}</span>
                                            @endif                                               
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="passwordConfirmation" class="col-sm-4 control-label">
                                            @lang('customers.address')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>   
                                        </label>
                                        <div class="col-sm-5">                                            
                                            <input type="address" class="form-control" id="passwordConfirmation" name="address" placeholder="@lang('user.address')">                                            

                                            @if(isset($messages['errors']['password_confirmation']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['password_confirmation'][0] !!}</span>
                                            @endif                                               
                                        </div>
                                    </div> 
                                    @endif
                                    <div class="form-group">
                                        <label for="card" class="col-sm-4 control-label">
                                            @lang('customers.price')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>
                                        </label>
                                        <div class="col-sm-5">                                            
                                            @if(!empty($data['card']))                                                                                                
                                                <input type="text" class="form-control" id="card" name="card" placeholder="@lang('user.card')" value="{!! $data['card'] !!}">
                                            @else 
                                                <input type="text" class="form-control" id="card" name="card" placeholder="@lang('user.card')">
                                            @endif      

                                            @if(isset($messages['errors']['card']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['card'][0] !!}</span>
                                            @endif   
                                        </div>
                                    </div> 
                                    
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="avatar" class="col-sm-4 control-label">@lang('customers.service')</label>
                                                <div class="col-sm-5"> 
                                                <select class="form-control"
                                                    name="customers[products][]" 
                                                    init="selectize"
                                                    multiple="multiple" 
                                                    data-placeholder="@lang('categories.selectCourse')">
                                                    @foreach($data['products'] as $product)
                                                        <option value="{!! $product->id !!}"
                                                            @if (!empty($data['productsId']) && in_array($product->id, $data['productsId']))
                                                                selected="selected"
                                                            @endif>
                                                            {!! $product->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                    
                                    </div>
                                        
                                        <!-- end box body -->
                                   
                                    <div class="form-group">
                                        <label for="telephone" class="col-sm-4 control-label">@lang('customers.note')</label>
                                        <div class="col-sm-5">
                                            @if(!empty($data['telephone']))                       
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="@lang('customers.note')" value="{!! $data['telephone'] !!}">
                                            @else 
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="@lang('customers.note')">
                                            @endif                                               
                                        </div>
                                    </div>                                    
                                </div>                    
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls series-action-bottom text-right">
                            @if (!$isEdit)
                            <button type="submit" name="saveAndCreate" class="btn btn-success btn-md">
                                <i class="fa fa-save"></i>
                                @lang('customers.saveAndCreate')
                            </button>
                            @endif
                            <button type="submit" name="save" class="btn btn-success btn-md">
                                <i class="fa fa-save"></i>
                                @lang('customers.save')
                            </button>
                            <a href="{!! URL::action('\Backend\Controllers\UserController@index') !!}">
                                <button type="button" class="btn btn-danger btn-md">
                                    <i class="fa fa-remove"></i>
                                    @lang('customers.cancel')
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </form>
    </div>
</section>

@stop