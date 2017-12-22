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
    return view('site.index');
});

// Users Auth Route
// Auth::routes();

/*
|--------------------------------------------------------------------------
| User Auth Routes
|--------------------------------------------------------------------------
*/
// Authentication Routes...
Route::get('login', 'User\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'User\Auth\LoginController@login');
Route::post('logout', 'User\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'User\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'User\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'User\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'User\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'User\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'User\Auth\ResetPasswordController@reset');
/*
|--------------------------------------------------------------------------
| End User Auth Routes
|--------------------------------------------------------------------------
*/


// User Email Verification Route
Route::get('register/verify/{token}', 'User\Auth\RegisterController@verify'); 

// Post-Auth Route
Route::get('/home', 'User\DashboardController@index')->name('home');
// Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Admin route for our multi-auth system
Route::get('/admin', 'Admin\DashboardController@index')->name('admin');

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/loginRequest', 'Admin\Auth\LoginController@showLoginRequestForm')->name('admin.login.request');
    Route::post('/loginRequest', 'Admin\Auth\LoginController@requestLoginPin')->name('admin.login.request.submit');
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');
    Route::post('/logout','Admin\Auth\LoginController@logout')->name('admin.logout');

    // Admin password reset routes
    Route::post('/password/email','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
});
