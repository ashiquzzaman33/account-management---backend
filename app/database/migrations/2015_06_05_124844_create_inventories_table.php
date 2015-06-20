<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create("inventories", function($table){

			$table->bigIncrements('id');
			$table->bigInteger("product_id")->unsigned();
			$table->bigInteger("godown_id")->unsigned();
			$table->decimal("quantity",15,5)->default(0);
			$table->decimal("purchase_price", 15, 5);
			$table->timestamp('purchase_date')->default(DB::raw('CURRENT_TIMESTAMP'));

			$table->foreign('product_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('godown_id')->references('id')->on('godowns')->onDelete('cascade');


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('inventories');
	}

}
