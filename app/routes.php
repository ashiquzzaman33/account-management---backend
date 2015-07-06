<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/**********************Project*******************/
Route::post('/add/project', array(
		'as'	=>	'createProject',
		'uses'	=>	'ProjectController@createProject'
));

Route::get('/get/project/all', array(
		'as'	=>	'getAllProject',
		'uses'	=>	'ProjectController@getAllProject'
));


/******************CnF************************/

Route::post('/add/cnf', array(
		'as'	=>	'createCnF',
		'uses'	=>	'CnFController@createCnF'
));
Route::get('/get/cnf/all', array(
		'as'	=>	'getAllCnF',
		'uses'	=>	'CnFController@getAllCnF'
));
/*******************LC***************************/
Route::post('/add/lc', array(
		'as'	=>	'createLC',
		'uses'	=>	'LCController@createLC'
));
Route::get('/get/lc/all', array(
		'as'	=>	'getAllLC',
		'uses'	=>	'LCController@getAllLC'
));
/*****************DEPOSIT VOUCHER***********/
Route::get('/add/deposit/voucher', array(
		'as'	=>	'createDepositVoucher',
		'uses'	=>	'DepositVoucherController@createDepositVoucher'
));



/***************Report Section**************/

Route::get('/report/ledger', array(
		'as'	=>	'getLedger',
		'uses'	=>	'ReportController@getLedger'
));
Route::get('report/balancesheet', array(
		'as'	=>	'getBalanceSheet',
		'uses'	=>	'ReportController@getBalanceSheet'
));
Route::get('/report/voucher', array(
		'as'	=>	'getVoucher',
		'uses'	=>	'ReportController@getVoucher'
));

Route::get('/report/party/details', array(
		'as'	=>	'getPartyWiseDetail',
		'uses'	=>	'ReportController@getPartyWiseDetail'
));

Route::get('/report/trialbalance', array(
		'as'	=>	'getTrialBalance',
		'uses'	=>	'ReportController@getTrialBalance'
));

/**********************Party Section**********************/

Route::get('/add/party', array(
		'as'	=>	'addParty',
		'uses'	=>	'PartyController@createParty'
));

Route::get('/get/party', array(
		'as'	=>	'getParty',
		'uses'	=>	'PartyController@getParties'
));
Route::get('/get/report/test', array(
		'as'	=>	'getBalanceTest',
		'uses'	=>	'ReportController@test'
));


Route::get('/get/account/type', array(
		'as'	=>	'getAccountType',
		'uses'	=>	'FilterController@getAccountType'
));

Route::get('/get/voucher/type', array(
		'as'	=>	'getVoucherType',
		'uses'	=>	'FilterController@getVoucherType'
));
Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/get/accounts', array(
		'as'	=>	'getaccounts',
		'uses'	=>	'AccountController@getAllAccount'
));
Route::post('/add/account', array(
		'as'	=>	'addAccount',
		'uses'	=>	'AccountController@addAccount'
));
Route::get('/add/location', array(
		'as'	=>	'addLocation',
		'uses'	=>	'LocationController@addLocation'
));
Route::post('/add/voucher_type', array(
		'as'	=>	'addVoucherType',
		'uses'	=>	'FilterController@addVoucherType'
));
Route::post('/add/account_type', array(
		'as'	=>	'addAccountType',
		'uses'	=>	'FilterController@addAccountType'
));
Route::get('/get/account_type', array(
		'as'	=>	'getAccountType',
		'uses'	=>	'FilterController@getAccountType'
));

Route::get('/get/locations', array(
		'as'	=>	'getLocations',
		'uses'	=>	'LocationController@getAllLocation'
));
Route::get('/get/next/voucherno', array(
		'as'	=>	'nextVoucherNo',
		'uses'	=>	'VoucherController@nextVoucherNo'
));
Route::post('/add/voucher', array(
		'as'	=>	'addVoucher',
		'uses'	=>	'VoucherController@addVoucher'
));
Route::get('/report/get/balance', array(
		'as'	=>	'getBalance',
		'uses'	=>	'ReportController@getBalanceOfAccount '
));

Route::post('/edit/location', array(
		'as'	=>	'editLocation',
		'uses'	=>	'LocationController@editLocation'
));

Route::post('/edit/account', array(
		'as'	=>	'editAccount',
		'uses'	=>	'AccountController@editAccount'
));

Route::get('/add/expense/vouchers', array(
		'as'	=>	'createExpenseVouchers',
		'uses'	=>	'ExpenseVoucherController@createExpenseVoucher'
));
Route::get('/update/settings', array(
		'as'	=>	'updateSettings',
		'uses'	=>	'SettingsController@postUpdateSettings'
));
Route::get('/get/settings', array(
		'as'	=>	'getSettings',
		'uses'	=>	'SettingsController@getSettings'
));
Route::post('/test', array(
		'as'	=>	'test',
		'uses'	=>	'TestController@uploadImage'
));
/*
*	Inventory
*/

Route::post('/add/products', array(
		'as'	=>	'addProducts',
		'uses'	=>	'ProductController@postAddProducts'
));
Route::get('/all/products', array(
		'as'	=>	'getProducts',
		'uses'	=>	'ProductController@getAllProducts'
));
Route::post('/products/ledger', array(
		'as'	=>	'postProductsLedger',
		'uses'	=>	'ProductController@postProductsLedger'
));

Route::get('/report/stock', array(
		'as'	=>	'stockReport',
		'uses'	=>	'InventoryReportController@getStockReport'
));
Route::get('/report/product/sellPurchase', array(
		'as'	=>	'getSingleProductSellPurchaseReport',
		'uses'	=>	'InventoryReportController@getSingleProductSellPurchaseReport'
));
Route::get('/report/product/all/sellPurchase', array(
		'as'	=>	'getAllProductSellPurchaseReport',
		'uses'	=>	'InventoryReportController@getAllProductSellPurchaseReport'
));
Route::get('/report/ledger/purchase', array(
		'as'	=>	'getPurchaseLedger',
		'uses'	=>	'InventoryReportController@getPurchaseLedger'
));
Route::get('/report/ledger/sell', array(
		'as'	=>	'getSellLedger',
		'uses'	=>	'InventoryReportController@getSellLedger'
));

