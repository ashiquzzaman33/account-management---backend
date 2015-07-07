<?php

class PartyController extends BaseController {


	public function createParty(){

			//Account Info
			$party_acc_name				=	Input::get("account_name");
			$acc_parent					=	Input::get("is_payble")=="true"? 34: 21;
			$account_type				=	Input::get('account_type');
			$account_desc				=	Input::get("account_description");
			$account_opening_balance	=	Input::get("opening_balance");
			$account_location			=	Input::get('location');

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {

					$status = json_decode(PartyController::createAccount($party_acc_name, $acc_parent, $account_type, $account_desc, $account_opening_balance,  $account_location));
					if($status->Status=="Failed"){
						throw new Exception(json_encode($status->Message), 1);
						
					}
					DB::table('parties')->insert(array(
						'name' 					=>	Input::get("party_name"),
						'address' 				=>	Input::get('party_address'),
						'mobile' 				=>	Input::get('party_mobile'),
						'email' 				=>	Input::get('party_email'),
						'image_url' 			=>	Input::get('party_image_url'),
						'company_name' 			=>	Input::get('party_company_name'),
						'company_address' 		=>	Input::get('party_company_addres'),
						'account_id' 			=>	$status->account_id
						)
					);
					DB::commit();

			}
			catch(\Exception $e)
			{
					DB::rollback();
					return json_encode(array("Status" => "Failed", "Message" => "".$e));
			}
			return json_encode(array("Status" => "Success", "Message" => "".$message));
	}
	public function getParties(){
		if(Input::get("id")!=null){
			return json_encode(DB::select(DB::raw("SELECT `id`, `name`, `address`, `mobile`, `email`, `image_url`, `company_name`, `company_address`, `account_id` FROM `parties` WHERE id=".Input::get("id").";")));
		}else if(Input::get("party_name")!=null){
			return json_encode(DB::select(DB::raw("SELECT `id`, `name`, `address`, `mobile`, `email`, `image_url`, `company_name`, `company_address`, `account_id` FROM `parties` WHERE name LIKE '%".Input::get("party_name")."%';")));
		}else if(Input::get("company_name")!=null){
			return json_encode(DB::select(DB::raw("SELECT `id`, `name`, `address`, `mobile`, `email`, `image_url`, `company_name`, `company_address`, `account_id` FROM `parties` WHERE company_name LIKE '%".Input::get("company_name")."%';")));
		}else if(Input::get("address")!=null){
			return json_encode(DB::select(DB::raw("SELECT `id`, `name`, `address`, `mobile`, `email`, `image_url`, `company_name`, `company_address`, `account_id` FROM `parties` WHERE company_address LIKE '%".Input::get("address")."%' OR address LIKE '%".Input::get("address")."';")));
		}else
		return json_encode(DB::select(DB::raw("SELECT `id`, `name`, `address`, `mobile`, `email`, `image_url`, `company_name`, `company_address`, `account_id` FROM `parties` WHERE 1")));
	}
	public static function getPartyDetails($id){
		return json_encode(DB::select(DB::raw("SELECT `id`, `name`, `address`, `mobile`, `email`, `image_url`, `company_name`, `company_address`, `account_id` FROM `parties` WHERE id=".$id.";")));
	}

	public static function createAccount($name, $parent, $account_type, $description, $opening_balance, $location, $id=null){


			$acc_id	=	AccountController::nextAccountNo();
			if($parent<7){
				throw new Exception("You can not add child to main head", 1);
			}
			$status 	= "Success";
			$message 	= " ";
			try {
				
				    DB::table('accounts')->insert(array(
				    		'id'			=>	$acc_id,
							'name' 			=> $name,
							'parent' 		=> $parent,
							'account_type'	=>  $account_type,
							'description' 	=> $description
						)
					);
				    
					DB::table('general_accounts')->insert(array(
							'account_id'			=>	$acc_id,
							'voucher_id' 			=> 	1,
							'against_account_id' 	=> 	1,
							'dr'					=>	0,
							'cr'					=>	0,
							'balance'				=>	$opening_balance,
							'remark' 				=> 	"Used to keep Opening balance of ".$name

						)
					);
					
					DB::table('all_childs')->insert(array(
							'parent'			=>	$parent,
							'children' 			=> 	$acc_id
						)
					);
					$parentList = Utilities::getChildList($parent);

					foreach ($parentList as $par) {
							DB::table('all_childs')->insert(array(
								'parent'			=>	$par,
								'children' 			=>  $acc_id
								)
						);
					}
					DB::table('childrens')->insert(array(
							'parent'			=>	$parent,
							'children' 			=> 	$acc_id
						)
					);

			}
			catch(\Exception $e)
			{
					$status = "Failed";
					$message = $e;					
			}
			$mss = array("Status" => $status, "Message" => $message, "account_id" => $acc_id);
			return json_encode($mss);
		}


}
