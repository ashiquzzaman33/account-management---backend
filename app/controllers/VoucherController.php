<?php 

	class VoucherController extends BaseController
	{

		public function addVoucher(){
				$location_id 	= 	Input::get("location_id");
				$voucher_id		=	Input::get("voucher_id");
				$date			=	Input::get("date");
				$narration		=	Input::get("narration");
				//Json with account_id, amount, remark
				$transactions	=	json_decode(Input::get("transaction"))->transaction;


				$debitCounter	= 0;
				$creditCounter 	= 0;
				$debitSum 		= 0;
				$creditSum		= 0;
				$baseAccDebit 	= "";
				$baseAccCredit 	= "";
				$status 	= "Success";
				$message 	= " ";
				$str = "";
				foreach ($transactions as $trans) {
				
					if($trans->amount<0){
						$baseAccCredit = $trans->account_id;
						$creditCounter++;
						$creditSum = $creditSum + (-1*$trans->amount);
					}else{
						$baseAccDebit = $trans->account_id;
						$debitCounter++;
						$debitSum = $debitSum + $trans->amount;
					}
				}
				
				$diff = $debitSum-$creditSum;

				if($diff<0)
					$diff = (-1)*$diff;

				if(($debitCounter>1&&$creditCounter>1)||$debitCounter<0||$creditCounter<0){
					return json_encode(array("Status" => "Failed", "Message" => "Debit & Credit account both  multiple are not allowed."));

				}else if($diff>0.0001){
					return json_encode(array("Status" => "Failed", "Message" => "Debit & Credit amount missmatch, Please check it again."));
				}else{

					DB::beginTransaction();
					try {

							$baseA = 0;
							if($debitCounter==1){
								$baseA = 1;
							}
							else
								$baseA = 2;

						    DB::table('vouchers')->insert(array(
									'id' 			=>	$voucher_id,
									'date' 			=>	$date,
									'location_id' 		=>	$location_id,
									'narration'		=>	$narration
								)
							);

							foreach ($transactions as $trans) {
								//For debit account
								if($baseA==1){
									if($trans->amount<0){
										DB::table('voucher_jorunals')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$baseAccDebit,
											'against_account_id'	=>	$trans->account_id,	
											'remark' 				=>	$trans->remark,
											'dr'					=>	(-1)*$trans->amount,
											'cr'					=>	0
											)
										);
										DB::table('voucher_jorunals')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$trans->account_id,
											'against_account_id'	=>	$baseAccDebit,	
											'remark' 				=>	$trans->remark,
											'dr'					=>	0,
											'cr'					=>	(-1)*$trans->amount
											)
										);
									}
								}
								//For credit account
								else if($baseA==2){

									if($trans->amount>=0){
										DB::table('voucher_jorunals')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$baseAccCredit,
											'against_account_id'	=>	$trans->account_id,	
											'remark' 				=>	$trans->remark,
											'dr'					=>	0,
											'cr'					=>	$trans->amount
											)
										);
										DB::table('voucher_jorunals')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$trans->account_id,
											'against_account_id'	=>	$baseAccDebit,	
											'remark' 				=>	$trans->remark,
											'dr'					=>	$trans->amount,
											'cr'					=>	0
											)
										);
									}
								}

							}
							DB::commit();
							//DB::rollback();
					}
					catch(\Exception $e)
					{
							$status = "Failed";
							$message = $e;	
							throw $e;				
						    DB::rollback();
					}

				}
			$mss = array("Status" => $status, "Message" => $message);
			return json_encode($mss);
		}
		public function nextVoucherNo(){
			return DB::table('vouchers')->max('id')+1;
		}
	}
 ?>