<?php 

	class VoucherController extends BaseController
	{

		public function addVoucher(){
				$location_id 	= 	Input::get("location_id");
				$voucher_id		=	$this->nextVoucherNo();
				$date			=	Input::get("date");
				$narration		=	Input::get("narration");
				$projectOrCnf   =	Input::get("projectOrCnf");
				$voucher_type	=	Input::get("voucher_type");
				
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
						if($baseAccCredit<58)
							throw new Exception("You can not insert data in Main Head Ledger! acc_id:  ".$baseAccCredit, 1);
						$creditCounter++;
						$creditSum = $creditSum + (-1*$trans->amount);
					}else{
						$baseAccDebit = $trans->account_id;
						$debitCounter++;
						if($baseAccDebit<58)
								throw new Exception("You can not insert data in Main Head Ledger! acc_id:  ".$baseAccDebit, 1);

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

							$type = json_decode(Utilities::getProjectOrCnFOrLcType($projectOrCnf));
							$type->type;
							$type->id;
							//TODO
							///
							//
							//
							//TODO


							$baseA = 0;
							if($debitCounter==1){
								$baseA = 1;
							}
							else
								$baseA = 2;

						    DB::table('vouchers')->insert(array(
									'id' 					=>	$voucher_id,
									'date' 					=>	$date,
									'project_or_cnf_or_lc'	=>	$projectOrCnf,
									'location_id' 			=>	$location_id,
									'narration'				=>	$narration,
									'voucher_type'			=>	$voucher_type
								)
							);

							foreach ($transactions as $trans) {
								//For debit account
								if($baseA==1){
									if($trans->amount<0){
										DB::table('general_accounts')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$baseAccDebit,
											'against_account_id'	=>	$trans->account_id,	
											'remark' 				=>	$trans->remark,
											'dr'					=>	(-1)*$trans->amount,
											'balance'				=>	Utilities::getCurrentBalance($baseAccDebit)+((-1)*$trans->amount),
											'cr'					=>	0
											)
										);
										DB::table('general_accounts')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$trans->account_id,
											'against_account_id'	=>	$baseAccDebit,	
											'remark' 				=>	$trans->remark,
											'balance'				=>	Utilities::getCurrentBalance($trans->account_id)+($trans->amount),
											'dr'					=>	0,
											'cr'					=>	(-1)*$trans->amount
											)
										);
									}
								}
								//For credit account
								else if($baseA==2){

									if($trans->amount>=0){
										DB::table('general_accounts')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$baseAccCredit,
											'against_account_id'	=>	$trans->account_id,	
											'remark' 				=>	$trans->remark,
											'balance'				=>	Utilities::getCurrentBalance($baseAccCredit)+((-1)*$trans->amount),
											'dr'					=>	0,
											'cr'					=>	$trans->amount
											)
										);
										DB::table('general_accounts')->insert(array(

											'voucher_id' 			=>	$voucher_id,
											'account_id' 			=>	$trans->account_id,
											'against_account_id'	=>	$baseAccCredit,
											'balance'				=>  Utilities::getCurrentBalance($trans->account_id)+($trans->amount),												
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