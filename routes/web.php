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

Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/reservation', 'ReservationController@reserve')->name('reservation.reserve');

Auth::routes();

//Redirect to the Login if not signed in
Route::group(['middleware'=>'auth', 'namespace'=>'Dashboard'], function(){
    Route::get('dashboard/admin', 'AdminController@index')->name('dashboard.admin');
    Route::resource('dashboard/slider', 'SliderController');
    Route::resource('dashboard/category', 'CategoryController');
    Route::resource('dashboard/item', 'ItemController');
});