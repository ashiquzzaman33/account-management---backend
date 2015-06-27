<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCnfTable extends Migration {

	public function up()
	{
			Schema::create("cnfs", function($table){
				$table->bigIncrements('id');
				$table->string('party_name');
				$table->string('party_address');
				$table->bigInteger("location_id")->unsigned();
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
		Schema::dropIfExists('cnfs');
	}

}
