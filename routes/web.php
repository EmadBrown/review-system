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

Route::get('/', function () {
    return view('pages/index');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function () {
  Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::group(['prefix' => 'dashboard'], function () {
      
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post( '/add/{id}' , 'AdminController@switch')->name('dashboard.switch');
    Route::post('/delete/{id}' , 'AdminController@delete')->name('review.delete');

});

Route::get('/', 'Web\ReviewController@index')->name('home');

Route::group(['prefix' => 'reivew', 'namespace' => 'Web'], function () {
    Route::post( '/add' , 'ReviewController@add')->name('review.add');
    Route::get( '/add' , 'ReviewController@create')->name('review.create');
 
});

