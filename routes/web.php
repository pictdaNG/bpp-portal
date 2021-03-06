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
    return redirect()->route('login');
   // return view('welcome');
});

Auth::routes();

Route::post('/login', "AuthenticationController@login")->name('post_login');

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');


//Contractor
Route::get('/contractor/registration', 'ContractorController@registration')->name('contractor_registration');
Route::post('/contractor/create', 'ContractorController@storeContractor')->name('contractor_storeCompany');
Route::get('/contractor/adverts', 'ContractorController@getAdverts');
Route::get('/contractor/uploaded/documents',  'ContractorController@getUploadedDocuments')->name('getUploadedDcument');
Route::get('/contractor/transactions/',  'ContractorController@getTransactions')->name('transactionsList');


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

//Route::resource('manageMDA', 'MDAController');

// Route::post('/mda/create', 'MDAController@storeMdas')->name('storeMdas');
// Route::post('/mda/delete', 'MDAController@deleteMda')->name('deleteMdas');
// Route::get('/mda/list', 'MDAController@getMdas')->name('getMdas');
// Route::get('/mad/{id}', 'MDAController@mdasPreview')->name('mdasPreview');

//MDA
Route::get('/mda/createAdvert', 'MDAController@createAdvert')->name('newMdaAdvert');
Route::get('/contractors/report', 'ReportController@contractors')->name('contractorReport');
/////
//Route::get('/contractors/report/{id}/{value}', 'ReportController@contractors')->name('contractorReport');
Route::post('/contractors/activate/{id}/{value}', 'ContractorController@editContractorStatus')->name('contractorAccount');





Route::get('/contractors/{id}', 'ReportController@contractorPreview')->name('contractorPreview');
Route::get('/mda/advert/bidrequirement/{advertId}/', 'MDAController@bidRequirements')->name('bidRequirements');
Route::post('/mda/create', 'MDAController@storeMdas')->name('storeMdas');
Route::post('/mda/delete', 'MDAController@deleteMda')->name('deleteMdas');
Route::get('/mda/list', 'MDAController@getMdas')->name('getMdas');
Route::get('/mad/{id}', 'MDAController@mdasPreview')->name('mdasPreview');
Route::get('/mda/advert/preview/{advertId}', 'MDAController@getMDAAdvertById');

Route::get('/admin/adverts/', 'AdvertController@getAdverts')->name('adminAdverts');
Route::get('/admin/adverts/opening', 'AdvertController@getAdvertsOpening');
Route::get('/mda/adverts/preview/{advertId}', 'MDAController@getMDAAdvertById');
Route::get('/admin/adverts/preview/{advertId}', 'MDAController@viewAdvertById');
Route::get('/admin/open/{advertId}', 'MDAController@viewAdvertOpeningById')->name('viewAdvertOpeningById');

//Adverts
Route::post('/advert/create', 'AdvertController@storeAdvert')->name('storeAdvert');
Route::get('/advert/adverts', 'AdvertController@adverts')->name('returnAdverts');
Route::post('/advert/delete', 'AdvertController@deleteAdvert')->name('deleteAdvert');
Route::get('/advert/active/preview/{advertId}', 'AdvertController@getAdvertById')->name('returnAds');
Route::post('/advert/update/', 'AdvertController@updateAdvert');
// Route::get('/adverts/preview/{advertId}', 'AdvertController@getSubmittedAdvertById');
Route::get('/adverts/preview/{advertId}', 'AdvertController@getAdvertById');

Route::post('/admin/advert/{advertId}/{status}', 'AdvertController@toggleAdvert');
Route::get('/adverts/category/{Id}', 'AdvertController@getAdvertByCatId');


//AdvertLot
Route::post('/advert-lot/create', 'AdvertLotController@storeAdvertLot')->name('storeAdvertLot');
Route::get('/advert-lot/advertLots', 'AdvertLotController@advertLots')->name('returnAdvertLots');
Route::post('/advert-lot/deleteAdvertLot', 'AdvertLotController@deleteAdvertLot')->name('deleteAdvert');


//bidsRequirement
Route::post('/bidRequirement/create/', 'TenderRequirementController@storeTenderRequirement')->name('storeRequirement');
Route::get('/bidRequirement/requirements/{lotId}', 'TenderRequirementController@tenderRequirement')->name('returnRequirements');
Route::post('/bidRequirement/delete', 'TenderRequirementController@deleteAdvert')->name('deleteRequirements');

// bids eligibility
Route::post('/admin/requirement/create', 'TenderEligibilityController@storeName')->name('storeName');
Route::get('/admin/requirement/names', 'TenderEligibilityController@index')->name('getEligibility');
Route::post('/admin/requirement/delete/', 'TenderEligibilityController@delete')->name('deleteName');

// ownership structure
Route::post('/ownership/structure/create', 'OwnershipStructureController@storeOwnershipStructure')->name('storeOwnershipStructure');
Route::get('/ownership/structures', 'OwnershipStructureController@getOwnershipStructure')->name('getOwnershipStructure');
Route::get('/ownership', 'OwnershipStructureController@index')->name('getOwnership');
Route::post('/ownership/delete/', 'OwnershipStructureController@delete')->name('ownership.delete');

// Equipments 
Route::post('/equipment/type/create', 'EquipmentController@storeEquipments')->name('storeEquipments');
Route::get('/equipment/types', 'EquipmentController@getEquipmentsType')->name('getEquipmentsType');
Route::get('/equipments', 'EquipmentController@index')->name('getEquipments');
Route::post('/equipment/delete/', 'EquipmentController@delete')->name('equipment.delete');

// Registration Fee
Route::post('/registration/fee/create', 'CategoryRegistrationFeeController@storeFee')->name('storeFee');
//Route::get('/fee/fees', 'ContractorRegistrationFeeController@getEquipmentsType')->name('getEquipmentsType');
Route::get('/fee/fees', 'CategoryRegistrationFeeController@index')->name('getFees');
Route::post('/fee/delete/', 'CategoryRegistrationFeeController@delete')->name('deleteFees');

// Business Categories
Route::post('/business-category/create', 'BusinessCategoryController@storeBusinessCategory')->name('storeBusinessCategory');
Route::get('/business/categories', 'BusinessCategoryController@getAllBusinessCategories')->name('getAllBusinessCategories');
Route::get('/business/business-categories', 'BusinessCategoryController@index')->name('fetchBusinessCategories');
Route::post('/business-category/delete/', 'BusinessCategoryController@delete')->name('deleteBusinessCategory');


//Advert Types
Route::post('/advert-type/create', 'AdvertTypeController@storeAdvertType')->name('storeAdvertType');
Route::get('/advert-type/types', 'AdvertTypeController@getAllAdvertTypes')->name('getAllAdvertTypes');
Route::get('/advert/advert-types', 'AdvertTypeController@index')->name('fetchAdvertTypes');
Route::post('/advert/delete/', 'AdvertTypeController@delete')->name('deleteAdvertType');


//Advert Mode
Route::post('/advert-mode/start', 'AdvertModeController@storeAdvertMode')->name('storeAdvertMode');
Route::get('/advert-mode/types', 'AdvertModeController@getAllAdvertModes')->name('getAllAdvertModes');
Route::get('/advert-mode/modes', 'AdvertModeController@index')->name('fetchAdvertModes');
Route::post('/advert-mode/delete/', 'AdvertModeController@delete')->name('deleteAdvertMode');




// Business sub Categories 1
Route::get('/business/subcategory1', 'BusinessSubCategory1Controller@getAllBusinessSubCategories')->name('getAllBusinessSubCategories');
Route::post('business/sub-category/create', 'BusinessSubCategory1Controller@storeBusinessCategory')->name('storeBusinessSubCategory');
Route::get('/business/sub-categories', 'BusinessSubCategory1Controller@index')->name('fetchBusinessSubCategories');
Route::post('business/sub-category/delete/', 'BusinessSubCategory1Controller@delete')->name('deleteBusinessSubCategory');

// Business sub Categories 2
Route::get('/business/subcategory2', 'BusinessSubCategory2Controller@getAllBusinessSubCategories')->name('getAllBusinessSubCategories2');

// Countries
Route::get('/countries', 'CountryController@getAllCountries')->name('getAllCountries');

// States
Route::get('/states', 'CountryController@getAllStates')->name('getAllStates');

Route::post('/contractor/upload', 'ContractorController@uploadContractorFile')->name('uploadContractorFile');
Route::post('/contractor/upload/delete', 'ContractorController@deleteContractorFile')->name('deleteContractorFile');
Route::get('/contractor/files', 'ContractorController@getDocumentsByUserId')->name('contractorFiles');
Route::get('/contractor/download/reg-category/','ContractorController@getIRR')->name('getIRR');
Route::get('/contractor/downloadPDF/{registrationId}','ContractorController@downloadPDF')->name('downloadPdf');
Route::get('/contractor/tender/apply/{advertId}','ContractorController@getAdvertById');
Route::post('password/update', 'ContractorController@updatePassword');
Route::get('contractor/change/password', 'ContractorController@getPasswordUpdate');
Route::post('/contractor/registration/finish', 'ContractorController@completeRegistration');






// PDF Name
Route::post('/admin/pdf/create', 'PDFCertificateNameController@storeName')->name('storePDFName');
Route::get('/admin/pdf/names', 'PDFCertificateNameController@index')->name('getPDFNames');
Route::post('/admin/pdf/delete/', 'PDFCertificateNameController@delete')->name('deletePDFName');

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
Route::post('/qualifications/delete/', 'QualificationController@delete')->name('qualifications.delete');

//sales
Route::get('/sales/list', 'SalesController@getSalesByUserId')->name('getSales');
Route::post('/sales/store', 'SalesController@storeSales')->name('storesales');
Route::get('/bid/pdf/{advertId}', 'SalesController@getSalesByUserandAdvert')->name('purchases');
Route::get('/bids/purchasedDocuments/', 'SalesController@getSalesByUser')->name('getPurchasedBids');
Route::get('/bid/downloadPDF/{salesId}','SalesController@downloadPDF')->name('getPdf');
// Transactions
Route::get('/mda/transactions/','SalesController@getTransactions')->name('transactions');
Route::post('mda/close_payment/{id}','SalesController@updatePaymentStatus')->name('updateTransactions');
Route::get('mda/change/password', 'MDAController@getPasswordUpdate');


//Route::delete('/qualifications/delete/{id}', 'QualificationController@delete')->name('qualifications.delete');