@extends('Frontend::layouts.main')

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
                    <form action="{!! URL::action('\Frontend\Controllers\MainController@login') !!}" method="post">
                        {!! csrf_field(csrf_token()) !!}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Tên liên hệ:</label>

                            <div class="col-md-6">
                                @if(!empty($data['name']))
                                <input id="name" type="text" class="form-control" name="name" value="{!! $data['name'] !!}">
                                @else 
                                <input id="name" type="text" class="form-control" name="name" value="">
                                @endif      

                                @if(isset($messages['errors']['name']))
                                <div class="alert alert-danger" role="alert">
                                    {!! $messages['errors']['name'][0] !!}
                                </div>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Số di động liên kết:</label>

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
                            <label for="name" class="col-md-4 control-label">Mã xác thực:</label>

                            <div class="col-md-6">
                                <input id="confirmation_code" type="text" class="form-control" name="confirmation_code" value="">                                
                            </div>
                        </div>     

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Đăng nhập
                                </button>    
                                <button type="button" id="get-verify-code" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Lấy mã xác thực
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