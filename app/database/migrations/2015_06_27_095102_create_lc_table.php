<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcTable extends Migration {

		public function up()
	{
			Schema::create("lcs", function($table){
				$table->bigInteger('lc_number');
				$table->string('party_name');
				$table->string('party_bank_name');
				$table->string('party_address');
				$table->string('our_bank_name');
				$table->decimal("lc_amount",15,5)->default(0);
				$table->timestamp('initialing_date');
				$table->timestamp('starting_date');
				$table->timestamp('dimilish_date');
				$table->string("type");
				$table->primary('lc_number');
		});			
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('lcs');
	}

}
