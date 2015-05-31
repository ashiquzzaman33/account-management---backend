<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("childrens", function($table){
			 $table->bigInteger("parent")->unsigned();
			 $table->bigInteger("children")->unsigned();
		});
		
		Schema::table('childrens', function($table) {
   				 $table->foreign('parent')->references('id')->on('accounts')->onDelete('cascade');
   				 $table->foreign('children')->references('id')->on('accounts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('childrens');
	}

}
