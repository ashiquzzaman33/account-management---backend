<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockLedgersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stockLedgers', function($t){
			$t->increments('id');
			$t->date('date');
			$t->string('voucher_type');
			$t->integer('item_id');
			$t->float('quantity');
			$t->double('rate',15,4);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('stockLedgers');
	}

}
