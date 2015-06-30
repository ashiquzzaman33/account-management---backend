<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartiesTable extends Migration {

		/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("parties", function($table){
			 $table->bigIncrements('id');
			 $table->string("name");
			 $table->string("address");
			 $table->string("mobile");
			 $table->string("email");
			 $table->string("image_url");
			 $table->string("company_name");
			 $table->string("company_address");
			 $table->bigInteger("account_id")->unsigned();
		});
		Schema::table('parties', function($table) {
   				 $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
   				 $table->unique( array('name','address') );
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('parties');
	}

}
