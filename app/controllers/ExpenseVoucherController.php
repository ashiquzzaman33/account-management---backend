<?php 

	class ExpenseVoucherController extends BaseController
	{
			public function createExpenseVoucher(){	
				 $data = json_decode(Input::get("data"))[0];

				DB::beginTransaction();
				$status 	= "Success";
				$message 	= " ";
				try {
						$id = DB::table('expense_vouchers')->count()+1;
					    DB::table('expense_vouchers')->insert(array(
					    		'id'					=> $id,
								'date' 					=> $data->date,
								'location_id' 			=> $data->location_id,
								'party_name' 			=> $data->party_name,
								'party_address' 		=> $data->party_address,
								'middle_man_name' 		=> $data->middle_man_name,
								'middle_man_address' 	=> $data->middle_man_address,
								'total' 				=> $data->total,
								'total_in_word' 		=> $data->total_in_word,
							)
						);
						$expenses = $data->expense;
						foreach ($expenses as  $ex) {
							DB::table('expenses')->insert(array(
								'expense_voucher_id' 		=> $id,
								'expense_description' 		=> $ex->expense_description,
								'amount' 					=> $ex->amount
								)
							);
						}
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
		public function getExpenseVoucher(){
			

		}

	/*	public function addLocation(){
			$name 				=	Input::get('name');
			$details 			=	Input::get('details');

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				    DB::table('locations')->insert(array(
							'name' 			=> $name,
							'details' 		=> $details,
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
		}*/

 ?>