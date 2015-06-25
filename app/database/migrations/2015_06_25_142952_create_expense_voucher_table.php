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
		Schema::create("expense_vouchers", function($table){
			$table->bigIncrements('id');

			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger("location_id")->unsigned();
			$table->string("party_name");
			$table->string("party_address");
			$table->string("middle_man_name");
			$table->string("middle_man_address");
			$table->decimal("total",15,5)->default(0);
			$table->string("total_in_word");
			$table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
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
