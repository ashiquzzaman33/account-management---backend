<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create("general_accounts", function($table){
				$table->bigIncrements('id');
				$table->bigInteger('voucher_id')->unsigned();
				$table->bigInteger('account_id')->unsigned();
				$table->bigInteger('against_account_id')->unsigned();
				$table->decimal('dr', 20, 5);
				$table->decimal('cr', 20, 5);
				$table->decimal('balance', 20, 5);	
				$table->string("remark");

		});

			
		Schema::table('general_accounts', function($table) {
   				 $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
   				 $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
   				 $table->foreign('against_account_id')->references('id')->on('accounts')->onDelete('cascade');

		});
	}
	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('general_accounts');
	}

}
