<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
  //admin login route
  Route::get( '/', [
    'uses' => 'AuthController@goToAdminLoginPage',
    'as'   => 'admin.login'
  ]);
  Route::post( 'post-login' , [
    'uses' => 'AuthController@postAdminLogin',
    'as'   => 'admin.post_login'
  ]);  
  //admin logout route
  Route::post( 'logout', [
    'uses' => 'AuthController@logoutFromLogin',
    'as'   => 'admin.logout'
  ]);

  Route::get('register', [
    'uses' => 'AuthController@registration',
    'as'   => 'admin.register'
  ]);

  Route::post('register', [
    'uses' => 'AuthController@userRegistration',
    'as'   => 'admin.post_register'
  ]);
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
  route::get('register-undangan', 'DashboardController@registerUndangan')->name('register-undangan');
  route::post('register-undangan', 'DashboardController@saveUndangan')->name('save-undangan');
  route::post('save-update-expired', 'DashboardController@saveExpired')->name('save-update-expired');
});

Route::post('/ajax/delete-item', 'AjaxController@selectedItemDeleteById')->name('selected-item-delete');

Route::group(['prefix' => '/'], function () {
  //admin login route
  Route::get('/', function () {
      return redirect()->route('admin.login');
  });

  Route::get( '/undangan/{key}', [
    'uses' => 'HomeController@registerUndangan',
    'as'   => 'register.undangan'
  ]);
  Route::post( '/undangan/{key}', [
    'uses' => 'HomeController@saveUndangan',
    'as'   => 'save.undangan'
  ]);
});