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
    return view('welcome');
});

// Users Auth Route
Auth::routes();

// Post-Auth Route
Route::get('/home', 'HomeController@index')->name('home');

//admin route for our multi-auth system
Route::get('/admin','AdminController@index')->name('admin');