<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_orders', function($t){
			$t->bigIncrements('id');
			$t->date('date')->nullable();
			$t->string('customer')->nullable();
			$t->string('address')->nullable();
			$t->string('goods')->nullable();
			$t->string('qty')->nullable();
			$t->string('word')->nullable();
			$t->string('place')->nullable();
			$t->string('trak')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('delivery_orders');
	}

}
