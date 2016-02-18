<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseOrderTable extends Migration {
 
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("purchase_order", function($table){
			
 			$table->increments('id');
			$table->string("name");
			$table->string("address");
			$table->date('date');
			$table->string("content", 10000);

			$table->decimal("total_price",20,5)->default(0);
			$table->decimal("shabek",20,5)->default(0);
			$table->decimal("grand_total",20,5)->default(0);
			$table->decimal("tt_dd_cash",20,5)->default(0);
			$table->decimal("jer",20,5)->default(0);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('purchase_order');
	}

}
