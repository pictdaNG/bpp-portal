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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/contractor/registration', 'ContractorController@registration')->name('contractor_registration');

Route::post('/contractor/store', 'ContractorController@storeCompany')->name('contractor_storeCompany');
Route::get('/logout', 'HomeController@logout')->name('logout');
