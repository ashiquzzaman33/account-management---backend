<?php

class UserController extends BaseController{
	public function getCreateUsers(){
		return View::make('create_users');
	}
	public function postCreateUsers(){

		DB::beginTransaction();
		try {

				DB::table('users')->insert(array(
					'username'				=>	Input::get('username'),
					'password'				=>	Input::get('password'),
					'inventory'				=>	Input::get('inventory') 			== 'true' ? 1 : 0,
					'project'				=>	Input::get('project') 				== 'true' ? 1 : 0,
					'lc'					=>	Input::get('lc') 					== 'true' ? 1 : 0,
					'cnf'					=>	Input::get('cnf')					== 'true' ? 1 : 0,
					'deposit_voucher'		=>	Input::get('deposit_voucher')		== 'true' ? 1 : 0,
					'expense_voucher'		=>	Input::get('expense_voucher') 		== 'true' ? 1 : 0,
					'sell'					=>	Input::get('sell') 					== 'true' ? 1 : 0,
					'purchase'				=>	Input::get('purchase') 				== 'true' ? 1 : 0,
					'party_create'			=>	Input::get('party_create') 			== 'true' ? 1 : 0,
					'ledger_create'			=>	Input::get('ledger_create') 		== 'true' ? 1 : 0,
					'voucher'				=>	Input::get('voucher') 				== 'true' ? 1 : 0,
					'bank'					=>	Input::get('bank') 					== 'true' ? 1 : 0,
					'inventory_report'		=>	Input::get('inventory_report') 		== 'true' ? 1 : 0,
					'trial_balance'			=>	Input::get('trial_balance') 		== 'true' ? 1 : 0,
					'balance_sheet'			=>	Input::get('balance_sheet') 		== 'true' ? 1 : 0,
					'financial_statement'	=>	Input::get('financial_statement') 	== 'true' ? 1 : 0,
					'database_maintanance'	=>	Input::get('database_maintanance') 	== 'true' ? 1 : 0,
				));
				DB::commit();
				return 'success';

			}
			catch(\Exception $e)
			{					
				DB::rollback();
				return 'error';
			}
		
	}
}