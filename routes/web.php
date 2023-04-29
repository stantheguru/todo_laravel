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

Route::get('/', 'HomeController@index');

Route::post('/', 'HomeController@index');
Route::post('/update_status', 'HomeController@update_status');

Route::post('/register', 'RegisterController@register');
Route::get('/register', 'RegisterController@register');

Route::post('/login', 'LoginController@login');
Route::get('/login', 'LoginController@login');
Route::get('/logout', 'HomeController@logout');



Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
 
    // ...
});