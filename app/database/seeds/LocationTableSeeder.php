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
		}
	}

 ?>