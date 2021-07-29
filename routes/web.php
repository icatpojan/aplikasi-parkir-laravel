<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/ocr', function () {
//     return view('lara_ocr.upload_image');
// });
Auth::routes();
Route::group(['namespace' => 'Web'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/user', 'UserController');
    Route::resource('/customer', 'CustomerController');
    Route::get('/customers', 'CustomerController@geting')->name('customer.geting');
    Route::post('/customers/{id}', 'CustomerController@keluar')->name('customer.keluar');

});
Route::view('users','livewire.home');
