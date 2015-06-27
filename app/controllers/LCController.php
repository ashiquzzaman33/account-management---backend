<?php

class LCController extends BaseController {
	
	public function createLC(){

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
					DB::table('lcs')->insert(array(
						'lc_number' 			=>	Input::get('lc_number'),
						'party_name' 			=>	Input::get('party_name'),
						'party_bank_name' 		=>	Input::get('party_bank_name'),
						'party_address' 		=>	Input::get('party_address'),
						'our_bank_name' 		=>	Input::get('our_bank_name'),
						'lc_amount' 			=>	Input::get('lc_amount'),
						'initialing_date' 		=>	Input::get('initialing_date'),
						'starting_date' 		=>	Input::get('starting_date'),
						'dimilish_date' 		=>	Input::get('dimilish_date'),
						'type' 					=>	Input::get('type'),
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
	public function getAllLC()
	{
		return json_encode(DB::select(DB::raw("SELECT `lc_number`, `party_name`, `party_bank_name`, `party_address`, `our_bank_name`, `lc_amount`, `initialing_date`, `starting_date`, `dimilish_date`, `type` FROM `lcs` WHERE 1")));
	}

}
