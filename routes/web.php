<?php
/**
 * @package     NanoCoins
 * @copyright   2017 Nanacoins. All rights reserved.
 * @license     DSPG License
 * @author      Portal, Chux and Victor
 */

 /**
  * Landing Page Routes
  * These are routes for pages like contact, info etc
  */
Route::view('/', 'site.index');

/**
 * Test Routes
 */
Route::get('/test', 'TestController@index');

/**
 * Guest Routes
 * The Below Routes are for non authenticated users
 * You can add as many routes (related to non authenticated admins) as possible
 */
Route::group(['middleware' => 'guest', 'prefix' => 'auth'], function () {
    // Default Redirect route
    Route::redirect('/', 'auth/login');

    // Login Routes
    Route::get('login', 'User\Auth\LoginController@showLoginForm')->name('user.login.form');
    Route::post('login', 'User\Auth\LoginController@login')->name('login.user');

    // Registration Routes...
    Route::get('register', 'User\Auth\RegisterController@showRegistrationForm')->name('user.registration.form');
    Route::post('register', 'User\Auth\RegisterController@register')->name('register.user');

    // Password Reset Routes...
    Route::get('password/reset', 'User\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request.form');
    Route::post('password/email', 'User\Auth\ForgotPasswordController@sendResetLinkEmail')->name('send.user.password.reset.link');
    Route::get('password/reset/{token}', 'User\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'User\Auth\ResetPasswordController@reset')->name('reset.user.password');

    // User Email Verification Route
    Route::get('register/verify/{token}', 'User\Auth\RegisterController@verify')->name('verify.user.email'); 
});


/**
 * Authenticated User's Routes
 * The Below Routes are for authenticated users
 * You can add as many routes (related to authenticated users) as possible
 */
Route::group(['middleware' => ['auth', 'useridentitycheck'], 'prefix' => 'app'], function () {
    // Default Redirect route
    Route::redirect('/', '/app/dashboard');

    // Authenticated User's App Routes
    Route::get('dashboard', 'User\DashboardController@index')->name('user.dashboard');
    
    // More below .....


    // User Logout Route
    Route::post('logout', 'User\Auth\LoginController@logout')->name('logout');
});




/**
 * Non Authenticated Admin Routes
 * The Below Routes are for non authenticated administrators
 * You can add as many routes (related to non authenticated admins) as possible
 */
Route::group(['middleware' => 'guest:admin', 'prefix' => 'adminAuth'], function () {
    // Default Redirect route
    Route::redirect('/', '/adminAuth/loginRequest');

    // Login Routes
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');
    Route::get('/loginRequest', 'Admin\Auth\LoginController@showLoginRequestForm')->name('admin.login.request');
    Route::post('/loginRequest', 'Admin\Auth\LoginController@requestLoginPin')->name('admin.login.request.submit');
    
    // Admin password reset routes
    Route::post('/password/reset','Admin\Auth\ResetPasswordController@reset')->name('admin.password.reset');
    Route::post('/password/email','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('/password/reset/{token}','Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset.form');

    // Login form route
    Route::group(['middleware' => 'accessadminlogin'], function () {
        Route::get('/login/{email}/{token}', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    });
});


/**
 * Authenticated Admin Routes
 * The Below Routes are for authenticated administrators
 * You can add as many routes (related to authenticated admins) as possible
 */
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    // Default Redirect route
    Route::redirect('/', '/admin/dashboard');

    // Admin routes
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    // More below ....


    // Admin Logout Route
    Route::post('logout','Admin\Auth\LoginController@logout')->name('admin.logout');
});
