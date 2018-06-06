<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('form.create');
});
Route::post('/form','FormController@store');
Route::post('contact','EmailController@postContact');
Route::get('/admin-login','AdminController@adminLogin');
Route::post('/admin-login-check','AdminController@adminLoginCheck');
Route::get('/admin-dashboard','AdminController@adminDashboard');
Route::get('/admin-logout','AdminController@adminLogout');
Route::get('/admin-user-list','AdminController@adminUserList');
Route::get('/user-registration','UserController@userRegistration');
Route::post('/save-user-information','UserController@saveUserInformation');
Route::get('/user-login','UserController@userLogin');
Route::post('/user-login-check','UserController@userLoginCheck');
Route::get('/user-dashboard','UserController@userDashboard');
Route::get('/single-user-info/{id}','UserController@userSingleInfo');
Route::get('/user-logout','UserController@userLogout');
Route::post('/change-password/{id}','UserController@changePassword');