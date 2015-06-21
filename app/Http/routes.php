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
Route::group([
    'as'        => 'admin::',
    'prefix'    => 'love@dmin',
    'namespace' => 'Admin'
], function () {

  Route::get('/', [
      'as'   => 'index',
      'uses' => 'DashboardController@index'
  ]);

  Route::resource('dashboard', 'DashboardController', [
      'only' => [
          'index'
      ]
  ]);

  Route::resource('posts', 'PostController');

});
