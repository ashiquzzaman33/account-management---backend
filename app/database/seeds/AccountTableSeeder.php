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
			//-------------------Main Head----------------------------------------
			DB::table('accounts')->insert(array(
					'id'					=>	2,
					'name'					=>	'assets',
					'account_type'			=>  1,
					'parent'				=>	1,
					'description'			=> 	"Root account table"
				));
			DB::table('accounts')->insert(array(
					'id'					=>	3,
					'name'					=>	'owners equity',
					'account_type'			=>  1,
					'parent'				=>	1,
					'description'			=> 	"Root account table"
				));
			DB::table('accounts')->insert(array(
					'id'					=>	4,
					'name'					=>	'liability',
					'account_type'			=>  1,
					'parent'				=>	1,
					'description'			=> 	"Root account table"
				));
			DB::table('accounts')->insert(array(
					'id'					=>	5,
					'name'					=>	'revenues',
					'account_type'			=>  1,
					'parent'				=>	1,
					'description'			=> 	"Root account table"
				));
			DB::table('accounts')->insert(array(
					'id'					=>	6,
					'name'					=>	'expense',
					'account_type'			=>  1,
					'parent'				=>	1,
					'description'			=> 	"Root account table"
				));
			//-------------------------First Order Child--------------------------------

			//For assets id = 2
			DB::table('accounts')->insert(array(
					'id'					=>	7,
					'name'					=>	'non current asset',
					'account_type'			=>  1,
					'parent'				=>	2,
					'description'			=> 	"Root account table"
				));
			DB::table('accounts')->insert(array(
					'id'					=>	8,
					'name'					=>	'current asset',
					'account_type'			=>  1,
					'parent'				=>	2,
					'description'			=> 	"Root account table"
				));

				//Second order child for non current asset id = 7
				DB::table('accounts')->insert(array(
					'id'					=>	9,
					'name'					=>	'property, plant and equipment - Office',
					'account_type'			=>  1,
					'parent'				=>	7,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	10,
					'name'					=>	'property, plant and equipment - Factory',
					'account_type'			=>  1,
					'parent'				=>	7,
					'description'			=> 	"Root account table"
				));

				DB::table('accounts')->insert(array(
					'id'					=>	11,
					'name'					=>	'investment',
					'account_type'			=>  1,
					'parent'				=>	7,
					'description'			=> 	"Root account table"
				));

				DB::table('accounts')->insert(array(
					'id'					=>	12,
					'name'					=>	'other non current asset',
					'account_type'			=>  1,
					'parent'				=>	7,
					'description'			=> 	"Root account table"
				));

				//Second order child for  current asset id = 8
				DB::table('accounts')->insert(array(
					'id'					=>	13,
					'name'					=>	'inventory - raw materials',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));

				DB::table('accounts')->insert(array(
					'id'					=>	14,
					'name'					=>	'inventory - electrical goods',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	15,
					'name'					=>	'loan and advance',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	16,
					'name'					=>	'advance income tax',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	17,
					'name'					=>	'margine account',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	18,
					'name'					=>	'preliminary expenses',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	19,
					'name'					=>	'inventory - others',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	20,
					'name'					=>	'security deposit',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	21,
					'name'					=>	'account receivable',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));	
				DB::table('accounts')->insert(array(
					'id'					=>	22,
					'name'					=>	'bank',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));			
				DB::table('accounts')->insert(array(
					'id'					=>	23,
					'name'					=>	'cash in hand',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	24,
					'name'					=>	'goods in transits',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));			
				DB::table('accounts')->insert(array(
					'id'					=>	25,
					'name'					=>	'interest receivable',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));			
				DB::table('accounts')->insert(array(
					'id'					=>	26,
					'name'					=>	'others receivable',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));				
				DB::table('accounts')->insert(array(
					'id'					=>	27,
					'name'					=>	'others current asset',
					'account_type'			=>  1,
					'parent'				=>	8,
					'description'			=> 	"Root account table"
				));	

			//-------------------------First Order Child for Owners Equity id =3--------------------------------

			//For owners Equity id = 3

				DB::table('accounts')->insert(array(
					'id'					=>	28,
					'name'					=>	'capital',
					'account_type'			=>  1,
					'parent'				=>	3,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	29,
					'name'					=>	'drawing',
					'account_type'			=>  1,
					'parent'				=>	3,
					'description'			=> 	"Root account table"
				));

			//-------------------------First Order Child for Liaility  id =4--------------------------------

			//For liability id = 4
				DB::table('accounts')->insert(array(
					'id'					=>	30,
					'name'					=>	'long term liability',
					'account_type'			=>  1,
					'parent'				=>	4,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	31,
					'name'					=>	'long term loan',
					'account_type'			=>  1,
					'parent'				=>	30,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	32,
					'name'					=>	'other long term liability',
					'account_type'			=>  1,
					'parent'				=>	30,
					'description'			=> 	"Root account table"
				));
				// For current Liability
				DB::table('accounts')->insert(array(
					'id'					=>	33,
					'name'					=>	'current liability',
					'account_type'			=>  1,
					'parent'				=>	4,
					'description'			=> 	"Root account table"
				));

				DB::table('accounts')->insert(array(
					'id'					=>	34,
					'name'					=>	'trade creditors',
					'account_type'			=>  1,
					'parent'				=>	33,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	35,
					'name'					=>	'other creditors',
					'account_type'			=>  1,
					'parent'				=>	33,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	36,
					'name'					=>	'short term loan',
					'account_type'			=>  1,
					'parent'				=>	33,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	37,
					'name'					=>	'interest payable',
					'account_type'			=>  1,
					'parent'				=>	33,
					'description'			=> 	"Root account table"
				));
			//-------------------------First Order Child for Revenues  id = 5--------------------------------

			//For Non-operating income id = 38

				DB::table('accounts')->insert(array(
					'id'					=>	38,
					'name'					=>	'non-operating income',
					'account_type'			=>  1,
					'parent'				=>	5,
					'description'			=> 	"Root account table"
				));
				
			//For operating income id = 39

				DB::table('accounts')->insert(array(
					'id'					=>	39,
					'name'					=>	'operating income',
					'account_type'			=>  1,
					'parent'				=>	5,
					'description'			=> 	"Root account table"
				));
			//For operating income id = 40

				DB::table('accounts')->insert(array(
					'id'					=>	40,
					'name'					=>	'capital gain',
					'account_type'			=>  1,
					'parent'				=>	5,
					'description'			=> 	"Root account table"
				));
			//-------------------------First Order Child for Expense  id = 6--------------------------------

				DB::table('accounts')->insert(array(
					'id'					=>	41,
					'name'					=>	'direct expense',
					'account_type'			=>  1,
					'parent'				=>	6,
					'description'			=> 	"Root account table"
				));
				//For direct expense id = 41
				DB::table('accounts')->insert(array(
					'id'					=>	42,
					'name'					=>	'direct materials',
					'account_type'			=>  1,
					'parent'				=>	41,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	43,
					'name'					=>	'direct labour',
					'account_type'			=>  1,
					'parent'				=>	41,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	44,
					'name'					=>	'direct expenses',
					'account_type'			=>  1,
					'parent'				=>	41,
					'description'			=> 	"Root account table"
				));
				//For indirect direct expense id = 45
				DB::table('accounts')->insert(array(
					'id'					=>	45,
					'name'					=>	'indirect expense',
					'account_type'			=>  1,
					'parent'				=>	6,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	46,
					'name'					=>	'indirect material',
					'account_type'			=>  1,
					'parent'				=>	45,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	47,
					'name'					=>	'indirect labor',
					'account_type'			=>  1,
					'parent'				=>	45,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	48,
					'name'					=>	'indirect expenses',
					'account_type'			=>  1,
					'parent'				=>	45,
					'description'			=> 	"Root account table"
				));
				//For indirect direct expense id = 49
				DB::table('accounts')->insert(array(
					'id'					=>	49,
					'name'					=>	'other expense',
					'account_type'			=>  1,
					'parent'				=>	6,
					'description'			=> 	"Root account table"
				));

				DB::table('accounts')->insert(array(
					'id'					=>	50,
					'name'					=>	'financial expenses',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	51,
					'name'					=>	'prior period adjustment',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	52,
					'name'					=>	'work-in-proces consumed',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	53,
					'name'					=>	'income tax',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	54,
					'name'					=>	'dep. on property, plant & equipment - office',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	55,
					'name'					=>	'selling expenses',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	56,
					'name'					=>	'administrative expenses',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
				DB::table('accounts')->insert(array(
					'id'					=>	57,
					'name'					=>	'distribution expenses',
					'account_type'			=>  1,
					'parent'				=>	49,
					'description'			=> 	"Root account table"
				));
					
		}
	}

 ?>