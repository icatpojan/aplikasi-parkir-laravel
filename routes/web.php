<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('qrcode', function () {
    \QrCode::size(500)
              ->format('png')
              ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

    return view('qrCode');

  });

Auth::routes();
Route::group(['namespace' => 'Web'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/user', 'UserController');

    Route::resource('/area', 'AreaController');


    Route::resource('/customer', 'CustomerController');
    Route::get('/customers', 'CustomerController@geting')->name('customer.geting');
    Route::post('/customers/{id}', 'CustomerController@keluar')->name('customer.keluar');

});
Route::view('users','livewire.home');
