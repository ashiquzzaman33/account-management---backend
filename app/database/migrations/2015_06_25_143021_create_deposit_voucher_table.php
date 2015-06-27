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
		Schema::create("deposit_voucher", function($table){
			$table->bigIncrements('id');
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger("location_id")->unsigned();
			$table->string("description");
			$table->string("party_name");
			$table->string("bank_acc_no");
			$table->string("branch");
			$table->string("address");
			$table->string("payment_type");
			$table->decimal("amount",15,5)->default(0);
			$table->string("amount_in_word");
			$table->string("note");
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
		Schema::dropIfExists('deposit_voucher');
	}


}
