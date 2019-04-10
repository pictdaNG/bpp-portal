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


//Compliance
Route::post('/compliance/create', 'ComplianceController@storeCompliance')->name('storeCompliance');


//Director
Route::post('/director/create', 'DirectorController@storeDirector')->name('storeDirector');
Route::get('/director/directors', 'DirectorController@directors')->name('returnDirector');



//ContractorCategory
Route::post('/category/create', 'ContractorCategoryController@storeCategory');

//ContractorPersonnel
Route::post('/personnel/create', 'ContractorPersonnelController@storePersonnel');


//contractorJobs
Route::post('/job/create', 'ContractorJobsController@storeJob');


//contractorFinance
Route::post('/finance/create', 'ContractorFinanceController@storeFinance');


//contractorMachinery
Route::post('/machinery/create', 'ContractorMachineryController@storeMachinery');




//Admin
Route::get('admin/manageMDA', 'MDAController@mda')->name('manageMDA');

//MDA
Route::get('/mda/createAdvert', 'MDAController@createAdvert')->name('newMdaAdvert');

//
Route::get('/contractors/report', 'ReportController@contractors')->name('contractorReport');
Route::get('/contractors/{id}', 'ReportController@contractorPreview')->name('contractorPreview');
Route::get('/mda/advert/bidrequirement/{advertId}/', 'MDAController@bidRequirements')->name('bidRequirements');
