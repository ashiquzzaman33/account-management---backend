<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalaryVoucherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create("salary_voucher", function($table){

			$table->increments('id');
			$table->date('date');

			$table->string('section');
			$table->string('party_name');
			$table->string('basis_on_or_date');
			$table->string('amount_in_words');

			$table->decimal("basic_salary",20,5)->default(0);
			$table->decimal("presence",20,5)->default(0);
			$table->decimal("total1",20,5)->default(0);
			$table->decimal("others",20,5)->default(0);
			$table->decimal("total2",20,5)->default(0);
			$table->decimal("advance",20,5)->default(0);

			$table->decimal("fine",20,5)->default(0);
			$table->decimal("apron_or_mask",20,5)->default(0);
			$table->decimal("other_deduction",20,5)->default(0);
			$table->decimal("grand_total",20,5)->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('salary_voucher');
	}

}
