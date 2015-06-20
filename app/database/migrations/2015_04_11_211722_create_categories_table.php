<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("categories", function($table){
			$table->bigIncrements('id');
			$table->string("name");
			$table->string("details");
			$table->string("unit");


			$table->string("name")->unique();;
			$table->decimal("quantity",15,5)->default(0);
			$table->string("unit");
			$table->decimal("purchase_price", 15, 5);
			$table->timestamp('purchase_date')->default(DB::raw('CURRENT_TIMESTAMP'));

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('categories');
	}

}
