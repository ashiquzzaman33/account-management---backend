<?php 
	/**
	* 
	*/
	class VoucherTableSeeder extends Seeder {
		
		public function run(){

			DB::table('vouchers')->insert(array(
					'id'				=>	1,
					'location'			=> "None",	
					'narration'			=> "First Voucher used in initial database creation"
				));
		}
	}

 ?>