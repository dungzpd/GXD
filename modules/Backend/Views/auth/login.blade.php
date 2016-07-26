@extends('Backend::layouts.auth')

@section('title', 'Login')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>{!! Alloy\Facades\Translation::En('Admin') !!}</b> {!! Alloy\Facades\Translation::En('GXD') !!}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{!! Alloy\Facades\Translation::En('Sign in to start your session') !!}</p>

        <form action="{!! URL::action('\Backend\Controllers\AuthController@login') !!}" method="post">
            {!! csrf_field(csrf_token()) !!}  
            @if(isset($messages['errors']['common']) || isset($messages['errors']['username']) || isset($messages['errors']['password']))
            <div class="form-group has-feedback">                
                <div class="alert alert-danger no-margin" role="alert">
                    {!! isset($messages['errors']['common']) ? $messages['errors']['common'] : '' !!}
                    {!! isset($messages['errors']['username']) ? $messages['errors']['username'][0] : '' !!}
                    {!! isset($messages['errors']['password']) ? $messages['errors']['password'][0] : '' !!}
                </div>           
            </div>                            
            @endif   
            <div class="form-group has-feedback">
                @if(!empty($data['username']))
                <input type="text" id="username" name="username" class="form-control" placeholder="{!! Alloy\Facades\Translation::En('Username') !!}"  value="{!! $data['username'] !!}">                
                @else                 
                <input type="text" id="username" name="username" class="form-control" placeholder="{!! Alloy\Facades\Translation::En('Username') !!}">
                @endif                
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password"  id="password" type="password" name="password" class="form-control" placeholder="{!! Alloy\Facades\Translation::En('Password') !!}">            
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"
                                init="iCheck"
                                data-icheck-class="icheckbox_flat-blue"
                                data-increase-area="20%"> {!! Alloy\Facades\Translation::En('Remember Me') !!}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{!! Alloy\Facades\Translation::En('Sign In') !!}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>--- {!! Alloy\Facades\Translation::En('OR') !!} ---</p>
            <a href="{!! URL::action('\Backend\Controllers\AuthController@forgot') !!}" class="btn btn-block btn-google btn-flat text-center">{!! Alloy\Facades\Translation::En('I forgot my password') !!}</a>         
        </div>
    </div>
    <!-- /.login-box-body -->
</div>
