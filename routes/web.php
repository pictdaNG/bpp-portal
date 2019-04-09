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
Route::get('/logout', 'HomeController@logout')->name('logout');


//Contractor
Route::get('/contractor/registration', 'ContractorController@registration')->name('contractor_registration');
Route::post('/contractor/create', 'ContractorController@storeContractor')->name('contractor_storeCompany');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/contractor/reports', 'ContractorController@reportsContractor')->name('contractor_reports');


//Compliance
Route::post('/compliance/create', 'ComplianceController@storeCompliance')->name('storeCompliance');


//Director
Route::post('/director/create', 'DirectorController@storeDirector')->name('storeDirector');




//Admin
Route::get('admin/manageMDA', 'MDAController@mda')->name('manageMDA');

//MDA
Route::get('/mda/createAdvert', 'MDAController@createAdvert')->name('newMdaAdvert');
// admin tools
Route::get('/admin/tools/compliance', 'AdminToolsController@compliance')->name('tools.compliance');
Route::post('/admin/compliance/store', 'AdminToolsController@postCompliances')->name('compliance.store');
Route::get( '/admin/compliance/delete/{id}', 'AdminToolsController@delete')->name('compliance.delete');
Route::get( '/admin/compliance/edit/{id}', 'AdminToolsController@edit')->name('compliance.edit');
Route::post( '/admin/compliance/update/{id}', 'AdminToolsController@update')->name('compliance.update');

//
