<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadataTable extends Migration {

	public function up()
	{
			Schema::create("metadata", function($table){
				$table->string('key');
				$table->string('value');
				$table->primary('key');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('metadata');
	}

}
