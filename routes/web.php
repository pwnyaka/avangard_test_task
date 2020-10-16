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
    return view('index');
})->name('Home');

Route::get('/weather', 'WeatherController@index')->name('Weather');

Route::get('/orders', 'OrdersController@index')->name('Orders');

Auth::routes();