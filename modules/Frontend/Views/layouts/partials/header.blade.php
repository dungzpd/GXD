<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-10 logo">
                <a href="{!! URL::to('/') !!}">
                    <img src="{!! asset('frontend/images/logo.png') !!}">
                </a>
            </div>
            <div class="col-sm-8 col-xs-2 main-menu">
                <div class="hotline fright">
                    <div class="hotline-wrap fright">
                        <a href="#">Hướng dẫn</a>
                        <a href="#">Trở thành giảng viên</a>
                        <h3>Hotline : 0985.099.938</h3>
                    </div>
                </div>
                <div class="login fright" data-id="{!! URL::action('\Frontend\Controllers\AuthController@logout') !!}">
                    @if(!Auth::check())
                        <a class="btn btn-primary" data-toggle="modal" href="#login">Đăng Nhập</a>
                        <a class="btn btn-success" href="{!! URL::action('\Frontend\Controllers\AuthController@register') !!}">Đăng ký</a>
                    @else
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <strong>{!! Auth::user()->username !!}</strong> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="{!! URL::action('\Frontend\Controllers\UserController@mycourses') !!}">
                                        Khóa học của tôi
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::action('\Frontend\Controllers\AuthController@logout') !!}">
                                        <i class="fa fa-sign-out"></i> Thoát
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <div class="modal fade" id="login" data-id="{!! URL::action('\Frontend\Controllers\AuthController@login') !!}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Đăng Nhập</h3>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <input data-id="login-username" type="text" class="form-control input-lg"  placeholder="Tên đăng nhập">
                                        </div>
                                        <div class="form-group">
                                            <input data-id="login-pass" type="password" class="form-control input-lg"  placeholder="Mật khẩu">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input data-id="remember-token" type="checkbox"> Ghi nhớ đăng nhập
                                            </label>
                                        </div>
                                        <button type="button" class="btn btn-success btn-lg" data-id="action-login">Đăng nhập</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="fright">
                    <li>
                        <a href="{!! URL::to('/about') !!}">
                            Giới thiệu
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::to('/courses') !!}">
                            Khóa học
                        </a>
                    </li>
                    <li>
                        <a href="http://dutoangxd.vn/video/" target="_blank">
                            Video
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::to('/teacher') !!}">
                            Giảng viên
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::to('/contact') !!}">
                            Liên hệ
                        </a>
                    </li>
                </ul>
                <div class="button-menu">
                    <div class="icon_menu"><span></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
