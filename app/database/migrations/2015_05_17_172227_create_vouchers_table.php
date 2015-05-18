<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create("vouchers", function($table){
				$table->bigIncrements('id');
				$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
				$table->string("location");
				$table->string("narration");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('vouchers');
	}

}
