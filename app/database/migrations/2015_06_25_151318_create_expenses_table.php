<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("expenses", function($table){
			$table->bigIncrements('id');
			$table->bigInteger("expense_voucher_id")->unsigned();
			$table->string("expense_description");
			$table->decimal("amount",15,5)->default(0);
			$table->foreign('expense_voucher_id')->references('id')->on('expense_vouchers')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('expenses');
	}

}
