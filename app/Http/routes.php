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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
	echo Config::get('app.settings.default.sadmin.email');
});
Route::get(Config::get('app.settings.url.register'),'UserController@showRegister');
Route::get(Config::get('app.settings.url.login'),'UserController@showLogin');
Route::post(Config::get('app.settings.url.login'),'UserController@doLogin');
//Route::get(Config::get('app.settings.url.admin_dashboard'),'AdminController@showDashboard');
Route::get(Config::get('app.settings.url.admin_dashboard').'/users/{id}/edit','AdminController@showUser');
Route::post(Config::get('app.settings.url.admin_dashboard').'/users/{id}/edit','AdminController@editUser');
Route::post(Config::get('app.settings.url.admin_dashboard').'/users/delete','AdminController@deleteUser');
Route::controller(Config::get('app.settings.url.admin_dashboard'),'AdminController');


