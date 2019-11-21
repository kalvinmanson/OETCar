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



Auth::routes();


Route::middleware(['auth'])->group(function () {
  Route::get('/', 'CarController@index');
  Route::resource('cars', 'CarController');
  Route::resource('users', 'UserController');
});
