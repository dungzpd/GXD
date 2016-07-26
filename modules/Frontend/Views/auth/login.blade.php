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
                                        <a class="btn btn-link forgot-link" href="{!! URL::action('\Frontend\Controllers\AuthController@forgot') !!}">Quên?</a>                                    
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
                                        <a href="{!! URL::action('\Frontend\Controllers\AuthController@register') !!}">
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