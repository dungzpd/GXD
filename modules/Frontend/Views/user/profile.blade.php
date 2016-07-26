@extends('Frontend::layouts.default')

@section('title', Lang::get('courses.courses'))

@section('content')
    <div class="breadcrumb-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li class="active">Giảng viên</li>
                    </ul>
                </div>
                <div class="col-sm-5 top-search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control  input-lg" placeholder="Tìm kiếm">
						<span class="input-group-btn">
							<button class="btn btn-default btn-lg" type="button"><i class="fa fa-search"></i></button>
						</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 sidebar">
                    <div class="sidebar-item">
                        <h3><i class="fa fa-bars"></i> Danh mục khóa học</h3>
                        <ul>
                            <li>
                                <a href="#">Học dự toán</a>
                            </li>
                            <li>
                                <a href="#">Đo bóc khối lượng</a>
                            </li>
                            <li>
                                <a href="#">Thanh quyết toán</a>
                            </li><li>
                                <a href="#">Hồ sơ hoàn công</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                    <h1 class="page-title">Thông tin giảng viên</h1>

                </div>
            </div>
        </div>
    </div>

@stop
