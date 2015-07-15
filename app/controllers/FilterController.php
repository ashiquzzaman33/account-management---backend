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
		public function getAccountType()
		{
			
			$projects = DB::table('projects')->get();
			$lcs = DB::table('lcs')->get();
			$cnfs = DB::table('cnfs')->get();

			$account_type = array();
			foreach ($projects as $p) {
				array_push($account_type, array(
						'id'	=>	$p->id,
						'name'	=>	$p->name . ' (Project)'
					));
			}
			foreach ($lcs as $l) {
				array_push($account_type, array(
						'id'	=>	$l->id + 500000,
						'name'	=>	$l->lc_number . '--' . $l->party_name . ' (LC)'
					));
			}

			foreach ($cnfs as $c) {
				array_push($account_type, array(
						'id'	=>	$c->id + 100000,
						'name'	=>	$c->party_name . ' (C&F)'
					));
			}

			return json_encode($account_type);


		}
		public function getVoucherType()
		{
			return json_encode(DB::table('voucher_types')->get());
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