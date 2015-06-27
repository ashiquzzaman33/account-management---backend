<?php 

	class DepositVoucherController extends BaseController
	{

			public function createDepositVoucher(){	

				DB::beginTransaction();
				$status 	= "Success";
				$message 	= " ";
				try {
					    DB::table('deposit_voucher')->insert(array(
								'date' 					=> Input::get("date"),
								'location_id' 			=> Input::get("location_id"),
								'description' 			=> Input::get("description"),
								'party_name' 			=> Input::get("party_name"),
								'bank_acc_no' 			=> Input::get("bank_acc_no"),
								'branch' 				=> Input::get("branch"),
								'address' 				=> Input::get("address"),
								'payment_type' 			=> Input::get("payment_type"),
								'amount' 				=> Input::get("amount"),
								'amount_in_word' 		=> Input::get("amount_in_word"),
								'note' 					=> Input::get("note")
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