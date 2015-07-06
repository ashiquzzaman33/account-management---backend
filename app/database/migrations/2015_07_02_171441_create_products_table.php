<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($t){
			$t->increments('id');
			$t->string('name');
			$t->float('p_qty');
			$t->float('s_qty');
			$t->double('last_p_rate',15,4);
			$t->double('last_s_rate',15,4);
			$t->double('avg_p_rate',15,4);
			$t->double('avg_s_rate',15,4);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}

}
