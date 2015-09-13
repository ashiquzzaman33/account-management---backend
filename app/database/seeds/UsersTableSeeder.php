<?php

class UsersTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert(array(
				'username'	=>	'admin',
				'password'	=>	'admin',
				'inventory'	=>	'1',
				'project'	=>	'1',
				'lc'	=>	'1',
				'cnf'	=>	'1',
				'deposit_voucher'	=>	'1',
				'expense_voucher'	=>	'1',
				'sell'	=>	'1',
				'purchase'	=>	'1',
				'party_create'	=>	'1',
				'ledger_create'	=>	'1',
				'voucher'	=>	'1',
				'bank'	=>	'1',
				'inventory_report'	=>	'1',
				'trial_balance'	=>	'1',
				'balance_sheet'	=>	'1',
				'financial_statement'	=>	'1',
				'database_maintanance'	=>	'1',
			));
	}
}