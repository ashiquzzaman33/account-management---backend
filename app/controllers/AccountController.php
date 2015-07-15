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
				$account_type		=	Input::get('account_type');
				$description 		=	Input::get('description');
				$opening_balance	= 	Input::get('opening_balance');
				$location			= 	Input::get("location_id");
			return AccountController::createAccount($name, $parent, $account_type, $description, $opening_balance, $location);
		}
		public static function createAccount($name, $parent, $account_type, $description, $opening_balance, $location, $id=null){
			$acc_id	=	AccountController::nextAccountNo();
			if($parent<7){
				throw new Exception("You can not add child to main head", 1);
			}
			DB::beginTransaction();
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
					$parentList = Utilities::getParentList($parent);

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
					DB::commit();

			}
			catch(\Exception $e)
			{
					$status = "Failed";
					$message = $e;					
				    DB::rollback();
			}
			$mss = array("Status" => $status, "Message" => $message, "account_id" => $acc_id);
			return json_encode($mss);
		}


		public function editAccount(){
			$id 				=	Input::get('id');
			$name 				=	Input::get('name');
			$parent 			=	Input::get('parent');
			$description 		=	Input::get('description');
			$account_type		= 	Input::get('account_type');
			$old_parent_id		=	Input::get('old_parent_id');
			$new_parent_id		=	Input::get('new_parent_id');


			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				   	DB::table('accounts')
           				->where('id', $id)
            			->update(array(
            				'name' 				=> $name,
            			    'parent' 			=> $parent,
            			    'account_type'		=> $account_type,
            			    'description' 		=> $description
            			    ));
            		DB::table('childrens')
           				->where('children', $id)
           				->where('parent', $old_parent_id)
            			->update(array(
            				'children' 				=> $id,
            			    'parent' 			=> $new_parent_id,
            			    ));
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




		//----------------------For Seeded purpose only---------

		public static function addAccountForSeed($id, $name, $parent, $account_type, $description, $opening_balance, $location){
			try {
				    DB::table('accounts')->insert(array(
				    		'id'			=> $id,
							'name' 			=> $name,
							'parent' 		=> $parent,
							'account_type'	=>  $account_type,
							'description' 	=> $description
						)
					);

					DB::table('general_accounts')->insert(array(
							'account_id'			=>	$id,
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
							'children' 			=> 	$id
						)
					);
					$parentList = Utilities::getParentList($parent);

					foreach ($parentList as $par) {
							DB::table('all_childs')->insert(array(
								'parent'			=>	$par,
								'children' 			=>  $id
								)
						);
					}
					DB::table('childrens')->insert(array(
							'parent'			=>	$parent,
							'children' 			=> 	$id
						)
					);

			}
			catch(\Exception $e)
			{
				    throw $e;				    
			}
		}

		public static function seed($data){
			DB::beginTransaction();
			try {
				    foreach ($data as  $d) {
				 		AccountController::addAccountForSeed($d['id'], $d['name'], $d['parent'], $d['account_type'],$d['description'], 0, 1);
					}
					//throw new Exception("Error Processing Request", 1);
					
					DB::commit();
			}
			catch(\Exception $e)
			{				
				   DB::rollback();
				   throw $e;
				    
			}
		}
		public function getParent(){
			return Utilities::getParentList(Input::get("acc_id"));
		}
		public function getParentList1(){
			return Utilities::getChildList(Input::get("acc_id"));
		}
		public static function nextAccountNo(){
			return DB::table('accounts')->max('id')+1;
		}

		public function getAllBanks(){
			$banks = DB::select(DB::raw("SELECT * FROM `accounts` where parent=22"));
			return json_encode($banks);
		}


	}
 ?>