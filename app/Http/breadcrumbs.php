<?php

// Admin
Breadcrumbs::register('admin', function($breadcrumbs) {
    $breadcrumbs->push(Lang::get('common.admin'), URL::action('\Backend\Controllers\AuthController@login'), ['icon' => 'fa fa-dashboard']);
});

// Admin > Dashboard
Breadcrumbs::register('dashboard', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(Lang::get('common.dashboard'), URL::action('\Backend\Controllers\CategoriesController@index'));
});

// Admin > Categories
Breadcrumbs::register('categories', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(Lang::get('categories.categories'), URL::action('\Backend\Controllers\CategoriesController@index'));
});
// Admin > Categories > Create
Breadcrumbs::register('categories.create', function($breadcrumbs) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push(Lang::get('common.add'), URL::action('\Backend\Controllers\CategoriesController@create'));
});
// Admin > Categories > Edit
Breadcrumbs::register('categories.edit', function($breadcrumbs) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push(Lang::get('common.edit'), URL::action('\Backend\Controllers\CategoriesController@edit', null));
});

// Admin > Courses
Breadcrumbs::register('courses', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(Lang::get('courses.courses'), URL::action('\Backend\Controllers\CourseController@index'));
});

// Admin > Courses > Edit > id
Breadcrumbs::register('courses.update', function($breadcrumbs, $courses) {
    $breadcrumbs->parent('courses');

    if (!empty($courses['courses']['name']) && !empty($courses['courses']['id'])) {
        $breadcrumbs->push($courses['courses']['name'], URL::action('\Backend\Controllers\CourseController@edit', $courses['courses']['id']));
    }

    if (empty($courses['courses']['name']) || empty($courses['courses']['id'])) {
        $breadcrumbs->push(Lang::get('courses.add'), URL::action('\Backend\Controllers\CourseController@create'));
    }
});

// Admin > Lessons
Breadcrumbs::register('lessons', function($breadcrumbs){
     $breadcrumbs->parent('admin');
    $breadcrumbs->push(Lang::get('lesson.lesson'), URL::action('\Backend\Controllers\LessonsController@index'));
});

// Admin > Lessons > Create
Breadcrumbs::register('lessons.create', function($breadcrumbs){
     $breadcrumbs->parent('admin');
    $breadcrumbs->push(Lang::get('common.add'), URL::action('\Backend\Controllers\LessonsController@create'));
});


// Admin > Account
Breadcrumbs::register('account', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(Lang::get('user.accountList'), URL::action('\Backend\Controllers\UserController@index'));
});

// Admin > Account > Create
Breadcrumbs::register('account.create', function($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push(Lang::get('user.accountCreate'), URL::action('\Backend\Controllers\UserController@create'));
});

// Admin > Account > Edit
Breadcrumbs::register('account.edit', function($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push(Lang::get('user.accountEdit'), URL::action('\Backend\Controllers\UserController@create'));
});

// Admin > Question
Breadcrumbs::register('question', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(Lang::get('question.list'), URL::action('\Backend\Controllers\QuestionController@index'));
});

// Admin > Question > Create
Breadcrumbs::register('question.create', function($breadcrumbs) {
    $breadcrumbs->parent('question');
    $breadcrumbs->push(Lang::get('question.create'), URL::action('\Backend\Controllers\QuestionController@create'));
});

// Admin > Question > Edit
Breadcrumbs::register('question.edit', function($breadcrumbs) {
    $breadcrumbs->parent('question');
    $breadcrumbs->push(Lang::get('question.edit'), URL::action('\Backend\Controllers\QuestionController@create'));
});

//fronend

//Index
Breadcrumbs::register('index', function($breadcrumbs) {
    $breadcrumbs->push('Trang chủ', URL::to('/'), ['icon' => 'fa fa-home']);
});

//Index
Breadcrumbs::register('search', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Tìm kiếm', URL::to('courses/search'));
});

//Index
Breadcrumbs::register('register', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Đăng ký', URL::to('/register'));
});

//About
Breadcrumbs::register('about', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('giới thiệu', URL::to('/about'));
});

//Contact
Breadcrumbs::register('contact', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('giới thiệu', URL::to('/contact'));
});

//Contact
Breadcrumbs::register('teacher', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push('teacher', URL::to('/teacher'));
});


//Home->Courses
Breadcrumbs::register('f_courses', function($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push(Lang::get('courses.courses'), URL::to('courses'));
});

//Home->Courses->Category
Breadcrumbs::register('f_courses.category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('f_courses');
    $breadcrumbs->push($category['name'], URL::to('courses\category', $category['id']));
});

//Home->Courses->->Category->view
Breadcrumbs::register('f_courses.view', function($breadcrumbs, $courses) {
    $breadcrumbs->parent('f_courses');
    $breadcrumbs->push($courses['name'], URL::to('courses\view', $courses['courses']['id']));
});


