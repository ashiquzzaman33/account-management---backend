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
Route::get('/add/project', array(
		'as'	=>	'createProject',
		'uses'	=>	'ProjectController@createProject'
));

Route::get('/get/project/all', array(
		'as'	=>	'getAllProject',
		'uses'	=>	'ProjectController@getAllProject'
));

/******************CnF************************/

Route::get('/add/cnf', array(
		'as'	=>	'createCnF',
		'uses'	=>	'CnFController@createCnF'
));
Route::get('/get/cnf/all', array(
		'as'	=>	'getAllCnF',
		'uses'	=>	'CnFController@getAllCnF'
));
/*******************LC***************************/
Route::get('/add/lc', array(
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


Route::get('/get/report/ledger', array(
		'as'	=>	'getLedger',
		'uses'	=>	'ReportController@getLedger'
));
Route::get('/get/report/balancesheet', array(
		'as'	=>	'getBalanceSheet',
		'uses'	=>	'ReportController@getBalanceSheet'
));
Route::get('/get/report/test', array(
		'as'	=>	'getBalanceTest',
		'uses'	=>	'ReportController@test'
));

Route::get('/get/account/type', array(
		'as'	=>	'getAccountType',
		'uses'	=>	'AccountController@getAccountType'
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
Route::get('/add/voucher_type', array(
		'as'	=>	'addVoucherType',
		'uses'	=>	'FilterController@addVoucherType'
));
Route::post('/add/account_type', array(
		'as'	=>	'addAccountType',
		'uses'	=>	'FilterController@addAccountType'
));

Route::get('/get/locations', array(
		'as'	=>	'getLocations',
		'uses'	=>	'LocationController@getAllLocation'
));
Route::get('/get/next/voucherno', array(
		'as'	=>	'nextVoucherNo',
		'uses'	=>	'VoucherController@nextVoucherNo'
));
Route::get('/add/voucher', array(
		'as'	=>	'addVoucher',
		'uses'	=>	'VoucherController@addVoucher'
));
Route::get('/report/get/balance', array(
		'as'	=>	'getBalance',
		'uses'	=>	'ReportController@getBalanceOfAccount '
));
Route::get('/report/get/voucher', array(
		'as'	=>	'getVoucher',
		'uses'	=>	'ReportController@getVoucher'
));
Route::post('/edit/location', array(
		'as'	=>	'editLocation',
		'uses'	=>	'LocationController@editLocation'
));

Route::get('/edit/account', array(
		'as'	=>	'editAccount',
		'uses'	=>	'AccountController@editAccount'
));

Route::get('/add/expense/vouchers', array(
		'as'	=>	'createExpenseVouchers',
		'uses'	=>	'ExpenseVoucherController@createExpenseVoucher'
));



