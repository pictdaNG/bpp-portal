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
// Route::get('/contractor/reports', 'ContractorController@reportsContractor')->name('contractor_reports');

//Compliance
Route::post('/compliance/create', 'ComplianceController@storeCompliance')->name('storeCompliance');
Route::get('/compliance/list', 'ComplianceController@getCompliance')->name('getCompliance');

//Director
Route::post('/director/create', 'DirectorController@storeDirector')->name('storeDirector');
Route::get('/director/directors', 'DirectorController@directors')->name('returnDirector');
Route::post('/director/delete', 'DirectorController@deleteDirector')->name('deleteDirector');

//ContractorCategory
Route::post('/category/create', 'ContractorCategoryController@storeCategory');
Route::post('/category/delete', 'ContractorCategoryController@deleteCategory');
Route::get('/category/categories', 'ContractorCategoryController@categories')->name('returnCategories');

//ContractorPersonnel
Route::post('/personnel/create', 'ContractorPersonnelController@storePersonnel');
Route::get('/personnel/personnels', 'ContractorPersonnelController@personnels')->name('returnPersonnel');
Route::post('/personnel/delete', 'ContractorPersonnelController@deletePersonnel')->name('deletePersonnel');

//contractorJobs
Route::post('/job/create', 'ContractorJobsController@storeJob');
Route::get('/job/jobs', 'ContractorJobsController@getJobs')->name('returnJobs');
Route::post('/job/delete', 'ContractorJobsController@deleteJob')->name('deleteJob');


//contractorFinance
Route::post('/finance/create', 'ContractorFinanceController@storeFinance');
Route::get('/finance/finances', 'ContractorFinanceController@getFinances')->name('returnFinances');
Route::post('/finance/delete', 'ContractorFinanceController@deleteFinance')->name('deleteFinance');


//contractorMachinery
Route::post('/machinery/create', 'ContractorMachineryController@storeMachinery');
Route::get('/machinery/machineries', 'ContractorMachineryController@getMachineries')->name('returnMachineries');
Route::post('/machinery/delete', 'ContractorMachineryController@deleteMachinery')->name('deleteMachinery');

//Admin
Route::get('/admin/manageMDA', 'MDAController@mda')->name('manageMDA');

//MDA
Route::get('/mda/createAdvert', 'MDAController@createAdvert')->name('newMdaAdvert');
Route::get('/contractors/report', 'ReportController@contractors')->name('contractorReport');
Route::get('/contractors/{id}', 'ReportController@contractorPreview')->name('contractorPreview');
Route::get('/mda/advert/bidrequirement/{advertId}/', 'MDAController@bidRequirements')->name('bidRequirements');
Route::post('/mda/create', 'MDAController@storeMdas')->name('storeMdas');
Route::post('/mda/delete', 'MDAController@deleteMda')->name('deleteMdas');
Route::get('/mda/list', 'MDAController@getMdas')->name('getMdas');

//Adverts
Route::post('/advert/create', 'AdvertController@storeAdvert')->name('storeAdvert');
Route::get('/advert/adverts', 'AdvertController@adverts')->name('returnAdverts');
Route::post('/advert/delete', 'AdvertController@deleteAdvert')->name('deleteAdvert');


//AdvertLot
Route::post('/advert-lot/create', 'AdvertLotController@storeAdvertLot')->name('storeAdvertLot');
Route::get('/advert-lot/advertLots', 'AdvertLotController@advertLots')->name('returnAdvertLots');
Route::post('/advert-lot/deleteAdvertLot', 'AdvertLotController@deleteAdvertLot')->name('deleteAdvert');


//bidsRequirement
Route::post('/bidRequirement/create/', 'TenderRequirementController@storeTenderRequirement')->name('storeRequirement');
Route::get('/bidRequirement/requirements/{lotId}', 'TenderRequirementController@tenderRequirement')->name('returnRequirements');
Route::post('/bidRequirement/delete', 'TenderRequirementController@deleteAdvert')->name('deleteRequirements');


// ownership structure
Route::post('/ownership/structure/create', 'OwnershipStructureController@storeOwnershipStructure')->name('storeOwnershipStructure');
Route::get('/ownership/structures', 'OwnershipStructureController@getOwnershipStructure')->name('getOwnershipStructure');
Route::get('/ownership', 'OwnershipStructureController@index')->name('getOwnership');
Route::delete('/ownership/delete/{id}', 'OwnershipStructureController@delete')->name('ownership.delete');

// Equipments 
Route::post('/equipment/type/create', 'EquipmentController@storeEquipments')->name('storeEquipments');
Route::get('/equipment/types', 'EquipmentController@getEquipmentsType')->name('getEquipmentsType');
Route::get('/equipments', 'EquipmentController@index')->name('getEquipments');
Route::delete('/equipment/delete/{id}', 'EquipmentController@delete')->name('equipment.delete');

// Business Categories
Route::get('/business/categories', 'BusinessCategoryController@getAllBusinessCategories')->name('getAllBusinessCategories');

// Business sub Categories 1
Route::get('/business/subcategory1', 'BusinessSubCategory1Controller@getAllBusinessSubCategories')->name('getAllBusinessSubCategories');

// Business sub Categories 2
Route::get('/business/subcategory2', 'BusinessSubCategory2Controller@getAllBusinessSubCategories')->name('getAllBusinessSubCategories2');

// Countries
Route::get('/countries', 'CountryController@getAllCountries')->name('getAllCountries');

// States
Route::get('/states', 'CountryController@getAllStates')->name('getAllStates');

Route::post('/contractor/upload', 'ContractorController@uploadContractorFile')->name('uploadContractorFile');
Route::post('/contractor/upload/delete', 'ContractorController@deleteContractorFile')->name('deleteContractorFile');
// Company Ownership
Route::get('/company/ownership/list', 'CompanyOwnershipController@index')->name('companyOwnership');
Route::get('/company/ownership', 'CompanyOwnershipController@getCompanyOwnership')->name('getCompanyOwnership');
Route::post('/company/ownership/store', 'CompanyOwnershipController@storeCompanyOwnership')->name('storeCompanyOwnership');

// Employment Type
Route::get('/employment/type', 'EmploymentTypeController@getAllEmploymentType')->name('getAllEmploymentType');

// qualifications
Route::get('/qualifications', 'QualificationController@getQualifications')->name('getQualifications');
Route::post('/qualifications/store', 'QualificationController@storeQualifications')->name('storeQualifications');
Route::get('/qualifications/list', 'QualificationController@index')->name('qualifications');
Route::delete('/qualifications/delete/{id}', 'QualificationController@delete')->name('qualifications.delete');