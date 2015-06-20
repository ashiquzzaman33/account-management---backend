<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGodownsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create("godowns", function($table){
			$table->bigIncrements('id');
			$table->string("name");
			$table->string("details");
			$table->bigInteger('location')->unsigned();

			$table->foreign('location')->references('id')->on('locations')->onDelete('cascade');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('godowns');
	}

}
