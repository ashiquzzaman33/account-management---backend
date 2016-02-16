<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lc_meta', function($t){
			$t->bigIncrements('id');
			$t->integer('lc_id');
			$t->decimal('dollar', 15, 2);
			$t->decimal('rate', 15, 2);
			$t->decimal('bd_amount', 15, 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('lc_meta');
	}

}
