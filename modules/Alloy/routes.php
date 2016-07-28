<?php

/*
    |--------------------------------------------------------------------------
    | Frontend Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
 */

//==== Normal Router ====
use Alloy\Facades\Run;

Route::group(['middleware' => ['normal']], function () {

    Route::get('img/{path}', function (League\Glide\Server $server, $path){
        $server->outputImage($path,$_GET);
    })->where('path','.+');

    Route::get('/', 'Frontend\Controllers\AuthController@index');
    Route::any('/about', 'Frontend\Controllers\AuthController@about');
    Route::any('/contact', 'Frontend\Controllers\AuthController@contact');
    Route::any('/register', 'Frontend\Controllers\AuthController@register');

    Route::any('/courses', 'Frontend\Controllers\CourseController@index');
    Route::any('/courses/view/{alias}', 'Frontend\Controllers\CourseController@view');
    Route::any('/courses/learn/{alias}', 'Frontend\Controllers\CourseController@learn');
    Route::any('/courses/category/{alias}', 'Frontend\Controllers\CourseController@category');
    Route::any('/courses/search', 'Frontend\Controllers\CourseController@search');

// Phan Dung add


   // 

    Route::any('/user/profile/{id}', 'Frontend\Controllers\UserController@profile');
    Route::any('/teacher', 'Frontend\Controllers\UserController@teacher');
    Route::any('/mycourses', 'Frontend\Controllers\UserController@mycourses');

    Route::any('/page/{alias}', 'Frontend\Controllers\PageController@view');
    Route::any('/page/contact', 'Frontend\Controllers\PageController@contact');

    Route::any('/recruitment', 'Frontend\Controllers\RecruitmentController@index');

    Route::post('/exams/complete', 'Backend\Controllers\ExamsController@complete');

    Route::any('/login', 'Frontend\Controllers\AuthController@login');
    Route::any('/register', 'Frontend\Controllers\AuthController@register');
    Route::get('/verify/{id}', 'Frontend\Controllers\AuthController@verify');
    Route::any('forgot-password', 'Frontend\Controllers\AuthController@forgot');
    Route::any('new-password/{token}', 'Frontend\Controllers\AuthController@newPassword');
    Route::get('/logout', 'Frontend\Controllers\AuthController@logout');
});

/*
    |--------------------------------------------------------------------------
    | Backend Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
 */
//==== Admin ====
Route::group(['prefix' => 'admin'], function () {
        Route::group(['middleware' => ['web']], function () {
                Route::any('/', 'Backend\Controllers\AuthController@index');
                Route::any('/login', 'Backend\Controllers\AuthController@login');
                Route::get('/logout', 'Backend\Controllers\AuthController@logout');
                Route::any('/register', 'Backend\Controllers\AuthController@register');
                Route::get('/verify/{id}', 'Backend\Controllers\AuthController@verify');
                Route::any('forgot-password', 'Backend\Controllers\AuthController@forgot');
                Route::any('new-password/{token}', 'Backend\Controllers\AuthController@newPassword');
                Route::any('profile', 'Backend\Controllers\AuthController@profile');

                Route::any('/users', 'Backend\Controllers\UserController@index');
                Route::any('/user/create', 'Backend\Controllers\UserController@create');
                Route::any('/user/edit/{id}', 'Backend\Controllers\UserController@edit');
                Route::get('/user/delete/{id}', 'Backend\Controllers\UserController@delete');
                Route::get('/user/status/{id}', 'Backend\Controllers\UserController@status');
                Route::post('/user/deleteMultiple', 'Backend\Controllers\UserController@deleteMultiple');

                Route::any('/categories', 'Backend\Controllers\CategoriesController@index');
                Route::any('/categories/create', 'Backend\Controllers\CategoriesController@create');
                Route::any('/categories/edit/{id}', 'Backend\Controllers\CategoriesController@edit');
                Route::any('/categories/status/{id}', 'Backend\Controllers\CategoriesController@status');
                Route::any('/categories/delete/{id}', 'Backend\Controllers\CategoriesController@delete');
                Route::any('/categories/deleteMultiple', 'Backend\Controllers\CategoriesController@deleteMultiple');

                Route::any('/courses', 'Backend\Controllers\CourseController@index');
                Route::any('/courses/create', 'Backend\Controllers\CourseController@create');
                Route::any('/courses/status/{id}', 'Backend\Controllers\CourseController@status');
                Route::any('/courses/edit/{id}', 'Backend\Controllers\CourseController@edit');
                Route::any('/courses/delete/{id}', 'Backend\Controllers\CourseController@delete');
                 Route::any('/courses/deleteMultiple', 'Backend\Controllers\CourseController@deleteMultiple');
// Phan Dung add
                Route::any('/products','Backend\Controllers\ProductController@index');
                Route::any('/products/create', 'Backend\Controllers\ProductController@create');
//
                Route::any('/questions', 'Backend\Controllers\QuestionController@index');
                Route::any('/question/create', 'Backend\Controllers\QuestionController@create');
                Route::any('/question/edit/{id}', 'Backend\Controllers\QuestionController@edit');
                Route::any('/question/delete/{id}', 'Backend\Controllers\QuestionController@delete');
                Route::get('/question/status/{id}', 'Backend\Controllers\QuestionController@status');
                Route::post('/question/deleteMultiple', 'Backend\Controllers\QuestionController@deleteMultiple');

                // Route Lessons
                Route::any('/lessons', 'Backend\Controllers\LessonsController@index');
                Route::any('/lessons/create', 'Backend\Controllers\LessonsController@create');
                Route::any('/lessons/share/{id}', 'Backend\Controllers\LessonsController@share');
                Route::any('/lessons/edit/{id}', 'Backend\Controllers\LessonsController@edit');
                Route::any('/lessons/delete/{id}', 'Backend\Controllers\LessonsController@delete');
                Route::get('/lessons/status/{id}', 'Backend\Controllers\LessonsController@status');
                Route::post('/lessons/deleteMultiple', 'Backend\Controllers\LessonsController@deleteMultiple');
                // End Route Lessons

                Route::post('/upload-vides', 'Backend\Controllers\BaseController@uploadVideos');
        });
});

//==== Cloud File ====
Route::group(['prefix' => 'file'], function () {
    Route::get('/{disk}/{fileName}', 'Backend\Controllers\BaseController@file');
    Route::get('/stream/{disk}/{fileName}', 'Backend\Controllers\BaseController@streamFile');
    Route::get('/download/{disk}/{fileName}', 'Frontend\Controllers\BaseController@downloadFile');
    Route::get('/remove/{disk}/{fileName}', 'Frontend\Controllers\BaseController@removeFile');
});

/*
    |--------------------------------------------------------------------------
    | Exception Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
 */
// Catch all undefined routes. Always gotta stay at the bottom since order of routes matters.
Route::any('{undefinedRoute}', function ($undefinedRoute) {
        return view('errors.503');
})->where('undefinedRoute', '([A-z\d-\/_.]+)?');

// Using different syntax for Blade to avoid conflicts with Jade.
// You are well-advised to go without any Blade at all.
Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
Blade::setEscapedContentTags('<%%', '%%>'); // For escaped data.


