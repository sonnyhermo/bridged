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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/offers','OfferController');//->middleware('verified');

Route::get('/search_offers', 'OfferController@search')->middleware('auth');

Route::resource('/my-profile','BorrowerController');//->middleware('verified');

Route::resource('/incomes', 'IncomeController');

Route::resource('/applications', 'ApplicationController');

Route::resource('/attachments', 'AttachmentController');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    //routes for users
    Route::resource('/users','Admin\AdminController');

    //routes for creditor
    Route::resource('/creditor','Admin\CreditorController');

    //routes for loans
    Route::resource('/loans', 'Admin\LoanController', ['except' => [ 'create' ] ]);

    //routes for purposes
    Route::resource('/purposes', 'Admin\PurposeController');

    //routes for classification
    Route::resource('/classifications', 'Admin\ClassificationController');


    //routes for banks and bank employees
    Route::resource('/banks','Admin\BankController');

    //routes for offers
    Route::resource('/offers','Admin\OfferController');

    //routes for branch
    Route::resource('/branches','Admin\BranchController')->only(['store', 'update', 'destroy']);

    //routes for datatables
    Route::get('/all_banks', 'Admin\DataTableController@fetchBanks')->name('datatable.banks');
    Route::get('/all_loans', 'Admin\DataTableController@fetchLoans')->name('datatable.loans');
    Route::get('/all_loan_purposes', 'Admin\DataTableController@fetchPurposes')->name('datatable.purposes');
    Route::get('/all_loan_classifications', 'Admin\DataTableController@fetchClassifications')->name('datatable.classifications');
    Route::get('/all_offers', 'Admin\DataTableController@fetchOffers')->name('datatable.offers');
    Route::get('/all_creditors', 'Admin\DataTableController@fetchCreditors')->name('datatable.creditors');
    Route::get('/bank_branches','Admin\DataTableController@fetchBranches')->name('datatable.branches');
    Route::get('all-admins', 'Admin\DataTableController@fetchAdmins')->name('datatable.admins');
    
});

Route::prefix('/creditor')->group(function(){
    Route::get('/login', 'Auth\CreditorLoginController@showLoginForm')->name('creditor.login');
    Route::post('/login', 'Auth\CreditorLoginController@login')->name('creditor.login.submit');
    Route::post('/logout', 'Auth\CreditorLoginController@logout')->name('creditor.logout');
    Route::get('/unassigned', 'Creditor\LoanController@unassigned');

    Route::get('/dashboard','Creditor\DashboardController@index')->name('creditor.dashboard');

    Route::match(['put', 'patch'], '/application/update-status/{application}', 'Creditor\ApplicationController@updateApplication');

    Route::get('/all_unassigned', 'Creditor\DataTableController@getUnassigned');

});