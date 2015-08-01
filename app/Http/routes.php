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

// List of patterns for route parameters

Route::patterns([
    'ARTICLE' => '^([a-z0-9]+(?:[_-]?[a-z0-9]+)*(?:\/[a-z0-9]+(?:[_-]?[a-z0-9]+)*)*)(?:-{2}([A-Za-z0-9_]+))?$'
]);

// Test URL
Route::get('test/{page}', [
    'as'   => 'test',
    'uses' => function ($page) {
        switch ($page) {
            case 'admin':
                return view('_testview/admin_index');
            case 'home':
                return view('_testview/home_index');
            default:
                return 'This URL is only for testing!';
        }
    }
]);

// Pages URL

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


// Define multi-level route

Route::get('tin/{ARTICLE?}', [
    'as'   => 'article.index',
    'uses' => 'ArticleController@index'
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

    // Whisper routes
    Route::group([
        'as'     => '',
        'middle' => 'auth',
    ], function () {
        Route::resource('whisper', 'WhisperController');
    });

});

// Controllers within the "App\Http\Controllers\Api" namespace
// Route name: api::...
Route::group([
    'as'        => 'api::',
    'prefix'    => '_api',
    'namespace' => 'Api'
], function () {

    // UploadFile routes
    Route::group([
        'as'         => 'func::',
        'middleware' => 'auth'
    ], function () {

        // _api/upload_image.py
        Route::match(['post', 'put'], 'upload_image.py', [
            'as'   => 'upload_image.store',
            'uses' => 'FileController@storeImage'
        ]);
        Route::get('upload_image.py', [
            'as'   => 'upload_image.index',
            'uses' => function () {
                return '<code>PUT your image :)</code>';
            }
        ]);

    });

});

// image
Route::get('image/{name?}', [
    'as'   => '_image.index',
    'uses' => 'Api\FileController@indexImage'
])->where('name', '^[a-z0-9_-]+(/[a-z0-9_-]+)*\.(jpg|png|gif)$');

// Default controllers

Route::controllers([
    'auth'     => Auth\AuthController::class,
    'password' => Auth\PasswordController::class,
]);
