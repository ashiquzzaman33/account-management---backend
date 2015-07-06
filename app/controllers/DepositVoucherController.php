<?php 

	class DepositVoucherController extends BaseController
	{

			public function createDepositVoucher(){	

				DB::beginTransaction();
				$status 	= "Success";
				$message 	= " ";
				try {
					    $id = DB::table('deposit_voucher')->insertGetId(array(
								'date'	=>	Input::get("date"),
								'details'	=>	Input::get("details"),
								'via'	=>	Input::get("via"),
								'bank_ac'	=>	Input::get("bank_ac"),
								'branch'	=>	Input::get("branch"),
								'address'	=>	Input::get("address"),
								'amount'	=>	Input::get("amount"),
								'method'	=>	Input::get("method"),
								'note'	=>	Input::get("note"),
								'word'	=>	Input::get("word"),
							)
						);
						DB::commit();
						return $id;
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