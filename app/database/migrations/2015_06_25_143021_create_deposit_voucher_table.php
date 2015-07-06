<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositVoucherTable extends Migration {

		/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("deposit_voucher", function($t){
			$t->increments('id');
			$t->date('date');
			$t->string('details');
			$t->string('via');
			$t->string('bank_ac');
			$t->string('branch');
			$t->string('address');
			$t->string('amount');
			$t->string('method');
			$t->string('note');
			$t->string('word');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('deposit_voucher');
	}


}
