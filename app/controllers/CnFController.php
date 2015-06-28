<?php

class CnFController extends BaseController {


	public function createCnF(){

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
					DB::table('cnfs')->insert(array(
						'party_name' 				=>	Input::get('party_name'),
						'party_address' 		=>	Input::get('party_address'),
						'location_id' 				=>	Input::get('location_id')
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
	public function getAllCnF()
	{
		return json_encode(DB::select(DB::raw("SELECT (id+".Constant::CNF_BASE.") as id, `party_name`, `party_address`, `location_id` FROM `cnfs` WHERE 1")));

	}

}
