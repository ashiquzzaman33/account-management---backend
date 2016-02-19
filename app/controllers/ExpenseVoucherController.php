<?php 

	class ExpenseVoucherController extends BaseController
	{
			public function createExpenseVoucher(){	
				DB::beginTransaction();
				$status 	= "success";
				$message 	= " ";
				try{
					DB::table('expense_vouchers')->insert(array(
							'date'				=>	Input::get('date'),
							'location'			=>	Input::get('location'),
							'receivers_name'	=>	Input::get('receivers_name'),
							'receivers_address'	=>	Input::get('receivers_address'),
							'via'				=>	Input::get('via'),
							'via_address'		=>	Input::get('via_address'),
							'in_word'			=>	Input::get('in_word'),
							'total'				=>	Input::get('total'),
							'expenses'			=>	Input::get('expenses')
						));
					DB::commit();
				}
				catch(\Exception $e)
				{
						$status = "error";
						$message = $e;
					    DB::rollback();
				}
				$mss = array("status" => $status, "message" => $message);
				return $status;
			}
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