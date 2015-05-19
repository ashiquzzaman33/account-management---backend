<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	public function up()
	{
			Schema::create("locations", function($table){
				$table->bigIncrements('id');
				$table->string('name');
				$table->string("details");
				$table->unique( array('name','details') );

		});			
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('locations');
	}

}
