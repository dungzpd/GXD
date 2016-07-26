<?php

namespace Alloy\Facades;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Support\Facades\Facade;
use Alloy\Services\Commons;

class Translation extends Facade {

    protected function formatKey($str, $sep = '_') {
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        return trim($res, $sep);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function En($keyword) {
        $dictionary = array(
            'admin' => 'Quản trị',
            'accounts' => 'Tài khoản',
            'categories' => 'Danh mục khoá học',
            'courses' => 'Khoá học',
            'lessons' => 'Bài học',
            'menu' => 'Danh sách chức năng',
            'sign_out' => 'Đăng xuất',
            'sign_in' => 'Đăng nhập',
            'remember_me' => 'Ghi nhớ tài khoản',
            'i_forgot_my_password' => 'Quên mật khẩu ?',
            'sign_in_to_start_your_session' => 'Đăng nhập để bắt đầu phiên làm việc',
            'search' => 'Tìm kiếm',
            'online' => 'Trực tuyến',
            'profile' => 'Thông tin tài khoản',
            'add_new_user' => 'Thêm mới tài khoản',
            'add_new_category' => 'Thêm mới danh mục',
            'add_new_course' => 'Thêm mới khoá học',
            'add_new_lesson' => 'Thêm mới bài học',
            'account_list' => 'Danh sách tài khoản',
            'category_list' => 'Danh sách khóa học',
            'dashboard_page' => 'Trang thống kê',
            'preview' => 'Xem trước',
            'copyright_2016' => 'Bản quyền thuộc công ty GXD &copy; 2016',
            'or' => 'Hoặc',
            'username' => 'Tên tài khoản',
            'email' => 'Email',
            'status' => 'Trạng thái',
            'actions' => 'Hoạt động',
            'password' => 'Mật khẩu'
        );
        
        $commonService = new Commons();
        $converKey =  $commonService->formatKey(trim(strtolower($keyword)));
        array_key_exists($converKey, $dictionary) ? $keyword = $dictionary[$converKey] : $keyword = $keyword;
        
        return $keyword;
    }

}
