<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','HomeController@getIndex');
Route::get('login','HomeController@getLogin');
Route::post('login','HomeController@postLogin');
Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postUser');
Route::get('logout', 'HomeController@logout');
Route::get('admin', 'UsersController@admin');

Route::resource('pharmacy', 'PharmaciesController');

Route::get('/inventory-1', 'PharmaciesController@inventOne');
Route::get('/inventory-2', 'PharmaciesController@inventTwo');

Route::resource('users', 'UsersController');