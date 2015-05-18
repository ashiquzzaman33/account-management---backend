<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherJournalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create("voucher_jorunals", function($table){
				$table->bigInteger('voucher_id')->unsigned();
				$table->bigInteger('account_id')->unsigned();
				$table->decimal('dr', 15, 3)->default(0.0);
				$table->decimal('cr', 15, 3)->default(0.0);
				$table->string("remark");
		});
		Schema::table('voucher_jorunals', function($table) {
   				 $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
   				 $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('voucher_jorunals');
	}

}
