<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("accounts", function($table){
			$table->bigIncrements('id');
			 $table->string("name");
			 $table->bigInteger("parent")->unsigned()->default(0);
			 $table->string("description");
		});
		Schema::table('accounts', function($table) {
   				 $table->foreign('parent')->references('id')->on('accounts')->onDelete('cascade');
   				 $table->unique( array('name','parent', 'description') );
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('accounts');
	}

}