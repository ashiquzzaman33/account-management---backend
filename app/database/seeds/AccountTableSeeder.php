<?php 
	/**
	* 
	*/
	class AccountTableSeeder extends Seeder {
		
		public function run(){

			DB::table('accounts')->insert(array(
					'id'					=>	1,
					'name'					=>	'Root',
					'account_type'			=>  1,
					'parent'				=>	1,
					'description'			=> 	"Root account table"
				));
		}
	}

 ?>