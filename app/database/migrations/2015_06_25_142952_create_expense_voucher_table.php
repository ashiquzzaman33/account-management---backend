<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseVoucherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("expense_vouchers", function($t){
			$t->bigIncrements('id');
			$t->timestamp('date');
			$t->bigInteger('location');
			$t->string('receivers_name');
			$t->string('receivers_address');
			$t->string('via');
			$t->string('via_address');
			$t->string('in_word');
			$t->float('total');
			$t->string('expenses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('expense_vouchers');
	}

}
