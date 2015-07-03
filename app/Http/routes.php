<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('test', [
    'as'   => 'test',
    'uses' => function () {
        return Route::is('test') ? 'true' : 'false';
    }
]);

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('chao-mung', [
    'as'   => 'welcome',
    'uses' => 'WelcomeController@index'
]);

Route::get('gioi-thieu', [
    'as'   => 'intro',
    'uses' => function () {
        return view('welcome.intro');
    }
]);

Route::get('lien-he', [
    'as'   => 'contact',
    'uses' => function () {
        return view('welcome.contact');
    }
]);

Route::get('lich-hoc', [
    'as'   => 'schedule',
    'uses' => function () {
        return view('welcome.schedule');
    }
]);

Route::get('chieu-sinh', [
    'as'   => 'enrolstudents',
    'uses' => function () {
        return view('welcome.enrolstudents');
    }
]);

// Actnews Posts
Route::get('tin-tuc-hoat-dong', [
    'as'   => 'actnews.index',
    'uses' => 'ActNewsController@index'
]);

Route::get('tin-tuc-hoat-dong/{uri}', [
    'as'   => 'actnews.show',
    'uses' => 'ActNewsController@show'
]);

// Controllers within the "App\Http\Controllers\Admin" namespace
// Route name: admin::@dmin-zone...
Route::group([
    'as'        => 'admin::',
    'prefix'    => '@dmin-zone',
    'namespace' => 'Admin',
], function () {

    // Dashboard routes
    Route::group([
        'as'         => '',
        'middleware' => ['adminzone', 'auth']
    ], function () {
        Route::get('/', [
            'as'   => 'index',
            'uses' => 'DashboardController@index'
        ]);
        Route::resource('dashboard', 'DashboardController', [
            'only' => ['index']
        ]);
    });

    // Posts routes
    Route::group([
        'as'     => '',
        'middle' => 'auth',
    ], function () {
        Route::resource('posts', 'PostController');
    });

});

// Controllers within the "App\Http\Controllers\Api" namespace
// Route name: api::...
Route::group([
    'as'        => 'api::',
    'prefix'    => 'api',
    'namespace' => 'Api'
], function () {

    // UploadFile routes
    Route::group([
        'as'         => 'func::',
        'middleware' => 'auth'
    ], function () {
        Route::match(['post', 'put'], '_upload_image.py', [
            'as'   => '_upload_image.store',
            'uses' => 'UploadFile@storeImage'
        ]);
        Route::get('_upload_image.py', [
            'as'   => '_upload_image.index',
            'uses' => function () {
                return '<code>PUT your image :)</code>';
            }
        ]);

    });

});

// Default controllers

Route::controllers([
    'auth'     => Auth\AuthController::class,
    'password' => Auth\PasswordController::class,
]);
