<?php 
	/**
	* 
	*/
	class VoucherTableSeeder extends Seeder {
		
		public function run(){

			DB::table('vouchers')->insert(array(
					'id'					=>	1,
					'location_id'			=> 1,
					'project_or_cnf_or_lc'	=> 0,
					'voucher_type'			=>1,	
					'narration'				=> "First Voucher used in initial database creation"
				));
		}
	}

 ?>