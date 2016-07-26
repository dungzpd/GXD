@extends('Backend::layouts.auth')

@section('title', 'Đăng ký tài khoản')

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
                    <form action="{!! URL::action('\Backend\Controllers\AuthController@register') !!}" method="post">
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
@endsection