<?php 

	class FilterController extends BaseController
	{
		
		/*public function getAllLocation(){
			$loc = DB::table('locations')->get();
			return json_encode($loc);
		}*/
		public function addAccountType(){
			$type 		= Input::get("type_name");
			$details 	= Input::get("details");

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				    DB::table('account_types')->insert(array(
							'type_name' 			=> $type,
							'details' 				=> $details,
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
		public function addVoucherType(){
			$type 		= Input::get("type_name");
			$details 	= Input::get("details");

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				    DB::table('voucher_types')->insert(array(
							'type_name' 			=> $type,
							'details' 				=> $details,
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