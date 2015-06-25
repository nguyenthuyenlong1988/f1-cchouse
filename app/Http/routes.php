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

Route::get('welcome', [
  'as'   => 'welcome',
  'uses' => 'WelcomeController@index'
]);

Route::get('/', [
  'as'   => 'home',
  'uses' => 'HomeController@index'
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
    'middle' => ['auth']
  ], function () {
    Route::resource('posts', 'PostController');
  });

});

// Controllers within the "App\Http\Controllers\Api" namespace
// Route name: ivy::api...
Route::group([
  'as'        => 'ivy::',
  'prefix'    => 'api',
  'namespace' => 'Api'
], function () {

  // UploadFile routes
  Route::group([
    'middleware' => 'auth'
  ], function () {
    Route::put('_upload_image.py', 'UploadFile@uploadImage');
    Route::get('_upload_image.py', [
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
