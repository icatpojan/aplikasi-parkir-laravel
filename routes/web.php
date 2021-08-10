<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('generate', function () {
    return view('qrCode');
});

Route::get('test', fn () => phpinfo());
Auth::routes();
Route::group(['namespace' => 'Web'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/user', 'UserController');

    Route::resource('/area', 'AreaController');


    Route::resource('/customer', 'CustomerController');
    Route::get('/customers', 'CustomerController@geting')->name('customer.geting');
    Route::post('/customers/{id}', 'CustomerController@keluar')->name('customer.keluar');
    Route::post('/print/{id}', 'CustomerController@print')->name('customer.print');
});
Route::view('users', 'livewire.home');

Route::get('/drop', function () {
    return view('dependent-dropdown/index');
});
Route::get('dependent-dropdown', 'DependentDropdownController@index')
    ->name('dependent-dropdown.index');
Route::post('dependent-dropdown', 'DependentDropdownController@store')
    ->name('dependent-dropdown.store');
