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
    return view('login');
});
Route::get('/signin', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Customer
Route::get('/add/customer', 'HomeController@showForm');
Route::post('/add/customer', 'HomeController@addCustomer');
Route::get('/customer/edit/{id}', 'HomeController@showEdit');
Route::post('update/customer', 'HomeController@updateCustomer');
Route::get('/customer/delete/{id}', 'HomeController@deleteCustomer');
Route::get('/customer/show/{id}', 'HomeController@showCustomer');


//Users
Route::get('/user','UserController@index');
Route::get('/add/user', 'UserController@showForm');
Route::post('/add/user', 'UserController@addUser');
Route::get('/user/edit/{id}', 'UserController@showEdit');
Route::post('update/user', 'UserController@updateUser');
Route::get('/user/delete/{id}', 'UserController@deleteUser');
Route::get('/user/profile','UserController@showProfile');
Route::post('/user/profile/upload','UserController@saveProfileimage');
Route::get('/user/change/password','UserController@ChangePassword');
Route::post('/update/password','UserController@updatePassword');
