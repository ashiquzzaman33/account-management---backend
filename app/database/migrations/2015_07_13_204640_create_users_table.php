<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($t){
			$t->increments('id');
			$t->string('username');
			$t->string('password');
			$t->integer('inventory');
			$t->integer('project');
			$t->integer('lc');
			$t->integer('cnf');
			$t->integer('deposit_voucher');
			$t->integer('expense_voucher');
			$t->integer('sell');
			$t->integer('purchase');
			$t->integer('party_create');
			$t->integer('ledger_create');
			$t->integer('voucher');
			$t->integer('bank');
			$t->integer('inventory_report');
			$t->integer('trial_balance');
			$t->integer('balance_sheet');
			$t->integer('financial_statement');
			$t->integer('database_maintanance');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
