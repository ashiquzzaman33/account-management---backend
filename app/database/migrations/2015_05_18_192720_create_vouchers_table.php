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
				$table->bigInteger("location_id")->unsigned();
				$table->string("narration");
				$table->bigInteger('project_or_cnf_or_lc');
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
		Schema::dropIfExists('vouchers');
	}

}
