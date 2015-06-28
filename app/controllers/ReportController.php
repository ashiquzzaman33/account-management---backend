<?php

class ReportController extends BaseController {

	public function getBalanceOfAccount()
	{
		return Utilities::getCurrentBalance(Input::get("id"));
	}
	public function getVoucher()
	{
		$v_id = Input::get("voucher_id");
		$vou =  DB::select(DB::raw("select date, narration, name as location, details as location_details FROM vouchers JOIN locations on locations.id=location_id where vouchers.id=".$v_id.";"));

		$gen =  DB::select(DB::raw("select name,  remark, voucher_id as Ref, SUM(dr) as Debit, SUM(cr) as Credit from general_accounts join accounts on accounts.id=account_id where voucher_id=2 GROUP BY (".$v_id.");"));
		
		$a = array("voucher" => $vou, "accounts" => $gen);
		return json_encode($a);	
		
	}
	public function getLedger(){
		$account_id 	= Input::get("account_id");
		$start_date 	= Input::get("start_date");
		$end_date	= Input::get("end_date");
		return json_encode(DB::select(DB::raw("SELECT general_accounts.`voucher_id`, `date`, `account_id`, `against_account_id`, `dr`, `cr`, `balance` FROM `general_accounts` JOIN (SELECT `id`, `date` FROM `vouchers` WHERE `date` between '".$start_date." 00:00:00' and '".$end_date." 23:59:00') x ON(general_accounts.voucher_id=x.id) WHERE account_id=".$account_id." ORDER BY `date`;")));
	}
	public function getBalanceSheet(){
		$date = null;
		if(Input::get("date")!=null){
			$date = Input::get("date");
		}else
		 {
		 	$date = '\'00-00-00 00:00:00\'';
		 }
		$array = array();
		for($i=7; $i<=57; $i++){
			$Object = new stdClass();
			$Object->id = $i;
			$Object->totalBalance = Utilities::getCurrentBalance($i, $date);
			$array[] = $Object;
		}
		return json_encode($array);
	}


	public function test(){
		$starttime = microtime(true);
		$res = Utilities::childBalance(1);
		$endtime = microtime(true);
		$duration = $endtime - $starttime;
		return $res."   ".$duration."  microseconds";
	}

}
