<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	public function up()
	{
			Schema::create("projects", function($table){
				$table->bigIncrements('id');
				$table->string('name')->unique();
				$table->decimal("investment",15,5)->default(0);
				$table->string('related_party');
				$table->timestamp('starting_date');
				$table->timestamp('operation_date');
				$table->timestamp('dimilish_date');
				$table->string("type");
				$table->bigInteger("location_id")->unsigned();
				$table->boolean("alarm")->default(false);
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
		Schema::dropIfExists('projects');
	}

}
