@extends('Frontend::layouts.default')

@section('content')
    {!! Breadcrumbs::setView('Frontend::layouts.partials.breadcrumb') !!}
    {!! Breadcrumbs::render('register') !!}
    <div class="main-content">
        <div class="container">
            <div class="row">
                @include('Frontend::layouts.partials.sidebar')
                <div class="col-sm-9">
                    <h1 class="page-title">Đăng ký</h1>
                    <div class="regiter-form">
                        @if(isset($messages['errors']['common']))
                            <div class="alert alert-danger" role="alert">
                                {!! $messages['errors']['common'] !!}
                            </div>
                        @endif
                        <form action="{!! URL::to('/register') !!}" method="post" class="form-horizontal">
                            {!! csrf_field(csrf_token()) !!}

                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Tên đăng nhập:</label>

                                <div class="col-sm-6">
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
                                <label for="email" class="col-sm-4 control-label">Địa chỉ Email:</label>

                                <div class="col-sm-6">
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
                                <label for="email" class="col-sm-4 control-label">Điện thoại:</label>

                                <div class="col-sm-6">
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
                                <label for="password" class="col-sm-4 control-label">Mật khẩu:</label>

                                <div class="col-sm-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if(isset($messages['errors']['password']))
                                        <div class="alert alert-danger" role="alert">
                                            {!! $messages['errors']['password'][0] !!}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">Xác nhận mật khẩu:</label>

                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    @if(isset($messages['errors']['password_confirmation']))
                                        <div class="alert alert-danger" role="alert">
                                            {!! $messages['errors']['password_confirmation'][0] !!}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Đăng ký
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
