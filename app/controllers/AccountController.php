<?php 

	class AccountController extends BaseController
	{
		
		public function getAllAccount(){
			$acc = DB::table('accounts')->get();
			return json_encode($acc);
		}
		public function addAccount(){
			$name 				=	Input::get('name');
			$parent 			=	Input::get('parent');
			$description 		=	Input::get('description');
			$opening_balance	= 	Input::get('opening_balance');
			$location			= 	Input::get("location");

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
			    // Validate, then create if valid
				    DB::table('accounts')->insert(array(
							'name' 			=> $name,
							'parent' 		=> $parent,
							'description' 	=> $description
						)
					);
					$account_id = DB::table('accounts')->select('id')->where('name', '=', $name)->first();
					DB::table('general_accounts')->insert(array(
							'account_id'			=>	$account_id->id,
							'narration' 			=> 	"Used to keep Opening balance of ".$name,
							'voucher_id' 			=> 	1,
							'against_account_id' 	=> 	$parent,
							'location'				=> 	$location,
							'dr'					=>	0,
							'cr'					=>	0,
							'balance'				=>	$opening_balance
						)
					);
					DB::commit();

			}
			catch(\Exception $e)
			{
					$status = "Failed";
					$message = $e;
				    DB::rollback();
			}
			$mss = array("Status" => $status, "Message" => $message);
			return json_encode($mss);
		}
	}
 ?>