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


Route::group([
    'prefix' => 'orders',
    'as' => 'Orders.'
], function () {
    Route::get('/', 'OrdersController@index')->name("index");
    Route::get('/{id}/edit', 'OrdersController@edit')->name("edit");
    Route::post('/{order}/update', 'OrdersController@update')->name("update");
    Route::get('/new', 'OrdersController@newOrders')->name("new_orders");
    Route::get('/current', 'OrdersController@currentOrders')->name("current_orders");
    Route::get('/fail', 'OrdersController@failOrders')->name("fail_orders");
    Route::get('/performed', 'OrdersController@performedOrders')->name("performed_orders");
});


Auth::routes();