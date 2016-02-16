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

Route::get('/report/party/all', array(
		'as'	=>	'getAllPartyReport',
		'uses'	=>	'ReportController@getPartyReport'
));
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

Route::post('/add/party', array(
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
Route::get('/add/account', array(
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

Route::get('/edit/account', array(
		'as'	=>	'editAccount',
		'uses'	=>	'AccountController@editAccount'
));

Route::get('/update/settings', array(
		'as'	=>	'updateSettings',
		'uses'	=>	'SettingsController@postUpdateSettings'
));
Route::get('/get/settings', array(
		'as'	=>	'getSettings',
		'uses'	=>	'SettingsController@getSettings'
));
Route::any('/trialbalance/sorted', array(
		'as'	=>	'getSortedTrialBalance',
		'uses'	=>	'TrialBalanceController@getSortedTrialBalance'
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
Route::get('/create/party', function(){
	return View::make('party');
});
Route::get('/create/users', array(
		'as'	=>	'getCreateUsers',
		'uses'	=>	'UserController@getCreateUsers'
));
Route::post('/create/users', array(
		'as'	=>	'postCreateUsers',
		'uses'	=>	'UserController@postCreateUsers'
));
Route::get('/bank', array(
		'as'	=>	'getAllBanks',
		'uses'	=>	'AccountController@getAllBanks'
));

Route::get('/view/party', array(
		'as'	=>	'getViewAllParty',
		'uses'	=>	'PartyController@getViewAllParty'
));
Route::get('/login', array(
		'uses'	=>	'LoginController@postLogin'
));
Route::get('/add/expenseVoucher', array(
		'as'	=>	'addExpenseVoucher',
		'uses'	=>	'ExpenseVoucherController@createExpenseVoucher'
));
Route::get('/get/voucher', array(
		'as'	=>	'getVoucher',
		'uses'	=>	'VoucherController@getVoucher'
));

Route::get('/get/authPass', array(
		'as'	=>	'getAuthPassword',
		'uses'	=>	'UserController@getAuthPassword'
));

Route::post('new/do', array(
		'as'	=>	'postNewDO',
		'uses'	=>	'DOController@postNewDO'
	));
Route::get('get/do', array(
		'as'	=>	'getDO',
		'uses'	=>	'DOController@getDO'
	));


/*
*	web report
*/
Route::get('/admin-login', array(
		'as'	=>	'getLogin',
		'uses'	=>	'AdminController@getLogin'
	));
Route::get('/admin-logout', array(
		'as'	=>	'getLogout',
		'uses'	=>	'AdminController@getLogout'
	));
Route::post('/admin-login', array(
		'as'	=>	'postLogin',
		'uses'	=>	'AdminController@postLogin'
	));
Route::get('/dashboard', array(
		'before'	=>	'require_login',
		'as'	=>	'getDashboard',
		'uses'	=>	'AdminController@getDashboard'
	));
Route::get('/ledger-report', array(
		'before'	=>	'require_login',
		'as'	=>	'getLedgerReport',
		'uses'	=>	'AdminController@getLedgerReport'
	));
Route::get('/admin/trial-balance', array(
		'before'	=>	'require_login',
		'as'	=>	'getAdminTrialBalance',
		'uses'	=>	'AdminController@getAdminTrialBalance'
	));

Route::get('/admin/party-report', array(
		'before'	=>	'require_login',
		'as'	=>	'getAdminPartyReport',
		'uses'	=>	'AdminController@getAdminPartyReport'
	));
Route::get('view/transaction', array(
		'as'		=>	'getViewTransaction',
		'uses'		=>	'AdminController@getViewTransaction'
	));
Route::get('get/transaction', array(
		'as'		=>	'getTransaction',
		'uses'		=>	'AdminController@getTransaction'
	));
Route::get('delete/user', array(
		'before'	=>	'require_login',
		'as'		=>	'getDeleteUser',
		'uses'		=>	'AdminController@getDeleteUser'
	));
Route::post('delete/user', array(
		'before'	=>	'require_login',
		'as'		=>	'postDeleteUser',
		'uses'		=>	'AdminController@postDeleteUser'
	));

Route::get('change-password', array(
		'before'	=>	'require_login',
		'as'		=>	'getChangePassword',
		'uses'		=>	'AdminController@getChangePassword'
	));
Route::post('change-password', array(
		'before'	=>	'require_login',
		'as'		=>	'postChangePassword',
		'uses'		=>	'AdminController@postChangePassword'
	));

Route::post('lc/add-meta', array(
		'as'		=>	'postLcMetaAdd',
		'uses'		=>	'LCController@postLcMetaAdd'
	));

Route::get('lc/meta', array(
		'as'		=>	'getLcMeta',
		'uses'		=>	'LCController@getLcMeta'
	));
// not complete yet
Route::get('get/voucher/{voucher_id}', array(
		'as'		=>	'getVoucherByVoucherId',
		'uses'		=>	'VoucherController@getVoucherByVoucherId'
	));


