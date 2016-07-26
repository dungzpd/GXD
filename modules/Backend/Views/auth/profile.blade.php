@extends('Backend::layouts.default')

@section('title', Lang::get($title))

@section('content')

{!! Breadcrumbs::render($breadcrumbs) !!}
<!-- Main content -->
<section class="content">
    <div class="row">
        <form action="{!! $actionForm !!}" method="post" enctype="multipart/form-data"> 
            {!! csrf_field(csrf_token()) !!}  
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('user.enterInfo')</h3>                   
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-list form-horizontal overflow-hidden">
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
                                            @lang('user.username')
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
                                            @lang('user.email')
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
                                            @lang('user.password')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>   
                                        </label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="@lang('user.password')">
                                            
                                            @if(isset($messages['errors']['password']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['password'][0] !!}</span>
                                            @endif                                               
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="passwordConfirmation" class="col-sm-4 control-label">
                                            @lang('user.passwordConfirmation')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>   
                                        </label>
                                        <div class="col-sm-5">                                            
                                            <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation" placeholder="@lang('user.passwordConfirmation')">                                            

                                            @if(isset($messages['errors']['password_confirmation']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['password_confirmation'][0] !!}</span>
                                            @endif                                               
                                        </div>
                                    </div> 
                                    @endif
                                    <div class="form-group">
                                        <label for="card" class="col-sm-4 control-label">
                                            @lang('user.card')
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
                                    <div class="form-group">
                                        <label for="avatar" class="col-sm-4 control-label">@lang('user.avatar')</label>
                                        <div class="col-sm-5">
                                            <div class="form-control">
                                                <input type="file" id="avatar" name="avatar"> 
                                            </div>                                            
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="telephone" class="col-sm-4 control-label">@lang('user.telephone')</label>
                                        <div class="col-sm-5">
                                            @if(!empty($data['telephone']))                       
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="@lang('user.telephone')" value="{!! $data['telephone'] !!}">
                                            @else 
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="@lang('user.telephone')">
                                            @endif                                               
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">@lang('user.name')</label>
                                        <div class="col-sm-5">
                                            @if(!empty($data['name']))                                                                       
                                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('user.name')" value="{!! $data['name'] !!}">
                                            @else 
                                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('user.name')">
                                            @endif                                              
                                        </div>
                                    </div>                                     
                                    <div class="form-group">
                                        <label for="gender" class="col-sm-4 control-label">@lang('user.gender')</label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="gender" name="gender">                                                
                                                <option value="male" {!! isset($data['gender']) ? ($data['gender'] == 'male' ? 'selected' : 1 == 1) : 1 == 1 !!}>@lang('user.male')</option>
                                                <option value="female" {!! isset($data['gender']) ? ($data['gender'] == 'female' ? 'selected' : 1 == 1) : 1 == 1 !!}>@lang('user.female')</option>
                                                <option value="other" {!! isset($data['gender']) ? ($data['gender'] == 'other' ? 'selected' : 1 == 1) : 1 == 1 !!}>@lang('user.other')</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="address" class="col-sm-4 control-label">@lang('user.address')</label>
                                        <div class="col-sm-5">          
                                            @if(!empty($data['address']))                                                                      
                                                <textarea class="form-control" rows="3" id="address" name="address" placeholder="@lang('user.address') ...">{!! $data['address'] !!}</textarea>                                                
                                            @else 
                                                 <textarea class="form-control" rows="3" id="address" name="address" placeholder="@lang('user.address') ..."></textarea>
                                            @endif                                            
                                        </div>                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-4 control-label">Mật khẩu:</label>

                                        <div class="col-md-5">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu">

                                            @if(isset($messages['errors']['password']))
                                            <div class="alert alert-danger" role="alert">
                                                {!! $messages['errors']['password'][0] !!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">Xác nhận mật khẩu:</label>

                                        <div class="col-md-5">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                                            @if(isset($messages['errors']['password_confirmation']))
                                            <div class="alert alert-danger" role="alert">
                                                {!! $messages['errors']['password_confirmation'][0] !!}
                                            </div>
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
                            <button type="submit" name="save" class="btn btn-success btn-md">
                                <i class="fa fa-save"></i>
                                @lang('user.save')
                            </button>
                            <a href="{!! URL::action('\Backend\Controllers\UserController@index') !!}">
                                <button type="button" class="btn btn-danger btn-md">
                                    <i class="fa fa-remove"></i>
                                    @lang('user.cancel')
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