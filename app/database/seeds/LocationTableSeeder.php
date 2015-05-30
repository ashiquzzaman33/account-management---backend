<?php 
	/**
	* 
	*/
	class LocationTableSeeder extends Seeder {
		
		public function run(){

			DB::table('locations')->insert(array(
					'id'					=>  1,
					'name'					=>	'None',
					'details'				=>	"Only Used for initilization."
				));
			DB::table('account_types')->insert(array(
					'id'					=>  1,
					'type_name'				=>	'None',
					'details'				=>	"Only Used for initilization."
				));
			DB::table('voucher_types')->insert(array(
					'id'					=>  1,
					'type_name'				=>	'None',
					'details'				=>	"Only Used for initilization."
				));
		}
	}

 ?>