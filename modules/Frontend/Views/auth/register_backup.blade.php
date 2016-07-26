@extends('Frontend::layouts.default')

@section('content')

<div id="wrapper overflow-hidden" class="wrapper content-wrapper login-form">   
    <div class="main-body">
        <div class="row">
            <div class="col-sm-3 col-sm-offset-9 login-area">
                <div class="panel panel-default">                        
                    <div class="panel-body">                        
                        <form action="{!! URL::action('\Frontend\Controllers\AuthController@login') !!}" method="post">
                            {!! csrf_field(csrf_token()) !!}                                                                                                  

                            <!--                            <div class="form-group">
                                                            <div class="col-sm-6">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="remember_token"/> Ghi nhớ
                                                                    </label>
                                                                </div>
                                                            </div>                                                              
                                                        </div>-->

                            <div class="form-group margin-bottom-5">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <label>
                                            Đăng nhập bằng
                                        </label>
                                    </div>
                                    <div class="row overflow-hidden">
                                        <button type="button" class="btn btn-primary btn-face">
                                            <i class="fa fa-btn fa-user"></i>FACEBOOK
                                        </button> 
                                    </div> 
                                </div>
                            </div>

                            <div class="form-group margin-bottom-5 margin-top-25">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <label>
                                            hoặc tên đăng nhập và mật khẩu
                                        </label>
                                    </div>                                
                                </div>
                            </div>

                            <div class="form-group no-margin-bottom">                                    
                                <div class="col-sm-12">
                                    <div class="row">
                                        @if(!empty($data['username']))
                                        <input id="username" type="text" class="form-control" name="username" placeholder="Tên đăng nhập" value="{!! $data['username'] !!}">
                                        @else 
                                        <input id="username" type="text" class="form-control" name="username" placeholder="Tên đăng nhập" value="">
                                        @endif      
                                    </div>                                    
                                </div>
                            </div>   

                            <div class="form-group no-margin-top">                                    
                                <div class="col-sm-12">
                                    <div class="row pass-area">                                        
                                        <input id="password" type="password" class="form-control" placeholder="Mật khẩu" name="password">
                                        <a class="btn btn-link forgot-link" href="{!! URL::action('\FrontEnd\Controllers\AuthController@forgot') !!}">Quên?</a>                                    
                                    </div>                                                                                                            
                                </div>
                            </div>

                            <div class="form-group  margin-top-25">
                                <div class="col-sm-12">
                                    <div class="row overflow-hidden">
                                        <button type="submit" class="btn btn-primary btn-normal">
                                            <i class="fa fa-btn fa-user"></i>ĐĂNG NHẬP
                                        </button> 
                                    </div>                                       
                                </div>
                            </div>

                            <div class="form-group margin-top-45">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <label class="color-black">
                                            Bạn chưa có tài khoản?
                                        </label>
                                    </div>
                                    <div class="row overflow-hidden">
                                        <a href="{!! URL::action('\FrontEnd\Controllers\AuthController@register') !!}">
                                            <button type="button" class="btn btn-primary btn-register">
                                                <i class="fa fa-btn fa-user"></i>ĐĂNG KÝ NGAY
                                            </button> 
                                        </a>                                        
                                    </div>                                       
                                </div>
                            </div>
                            @if(isset($messages['errors']['common']) || isset($messages['errors']['username']) || isset($messages['errors']['password']))
                            <div class="form-group">
                                <div class="row">
                                    <div class="alert alert-danger no-margin" role="alert">
                                        {!! isset($messages['errors']['common']) ? $messages['errors']['common'] : '' !!}
                                        {!! isset($messages['errors']['username']) ? $messages['errors']['username'][0] : '' !!}
                                        {!! isset($messages['errors']['password']) ? $messages['errors']['password'][0] : '' !!}
                                    </div>
                                </div>
                            </div>                            
                            @endif                            
                        </form>
                    </div>
                </div>           
            </div>
        </div>
    </div>   
</div>  

@stop

<!--@extends('FrontEnd::layouts.frontend.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    @if(isset($messages['errors']['common']))
                    <div class="alert alert-danger" role="alert">
                        {!! $messages['errors']['common'] !!}
                    </div>
                    @endif
                    <form action="{!! URL::action('\FrontEnd\Controllers\AuthController@register') !!}" method="post">
                        {!! csrf_field(csrf_token()) !!}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Tên đăng nhập:</label>

                            <div class="col-md-6">
                                @if(!empty($data['username']))
                                    <input id="username" type="text" class="form-control" name="username" value="{!! $data['username'] !!}">
                                @else 
                                    <input id="username" type="text" class="form-control" name="username" value="">
                                @endif      
                                
                                @if(isset($messages['errors']['username']))
                                <div class="alert alert-danger" role="alert">
                                    {!! $messages['errors']['username'][0] !!}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Địa chỉ Email:</label>

                            <div class="col-md-6">                               
                                @if(!empty($data['email']))
                                    <input id="email" type="email" class="form-control" name="email" value="{!! $data['email'] !!}">
                                @else 
                                    <input id="email" type="email" class="form-control" name="email" value="">
                                @endif     
                                
                                @if(isset($messages['errors']['email']))
                                <div class="alert alert-danger" role="alert">
                                    {!! $messages['errors']['email'][0] !!}
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Điện thoại:</label>

                            <div class="col-md-6">                               
                                @if(!empty($data['telephone']))
                                    <input id="telephone" type="text" class="form-control" name="telephone" minlength="10" maxlength="11" value="{!! $data['telephone'] !!}">
                                @else 
                                    <input id="telephone" type="text" class="form-control" name="telephone" minlength="10" maxlength="11" value="">
                                @endif     
                                
                                @if(isset($messages['errors']['telephone']))
                                <div class="alert alert-danger" role="alert">
                                    {!! $messages['errors']['telephone'][0] !!}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Mật khẩu:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                
                                @if(isset($messages['errors']['password']))
                                <div class="alert alert-danger" role="alert">
                                    {!! $messages['errors']['password'][0] !!}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Xác nhận mật khẩu:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                @if(isset($messages['errors']['password_confirmation']))
                                <div class="alert alert-danger" role="alert">
                                    {!! $messages['errors']['password_confirmation'][0] !!}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection-->