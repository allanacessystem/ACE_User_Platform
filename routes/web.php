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

//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('registerEmployee', 'Auth\RegisterController@showRegistrationFormE')->name('registerEmployee');//->with('register',"registerEmployee");
Route::post('registerEmployee', 'Auth\RegisterController@createEmployee');

Route::get('registerCustomer', 'Auth\RegisterController@showRegistrationFormC')->name('registerCustomer');//->with('register',"registerCustomer");
Route::post('registerCustomer', 'Auth\RegisterController@createCustomer');

Route::get('registerSuperAdmin', 'Auth\RegisterController@showRegistrationFormSA')->name('registerSuperAdmin');//->with('register',"registerSuperAdmin");
Route::post('registerSuperAdmin', 'Auth\RegisterController@createSuperAdmin');

// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home');

