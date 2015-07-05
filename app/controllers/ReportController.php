<?php

class ReportController extends BaseController {


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
		return json_encode(DB::select(DB::raw("SELECT general_accounts.`voucher_id`, `date`, `account_id`, `against_account_id`, `dr`, `cr`, `balance`, `remark` FROM `general_accounts` JOIN (SELECT `id`, `date` FROM `vouchers` WHERE `date` between '".$start_date." 00:00:00' and '".$end_date." 23:59:00') x ON(general_accounts.voucher_id=x.id) WHERE account_id=".$account_id." ORDER BY `voucher_id`,`date`;")));
	}
	public function getPartyWiseDetail(){
		$id = Input::get("party_id");
		$obj = new stdClass();
		$obj->partyDetails  =  json_decode(PartyController::getPartyDetails($id));
		if(count($obj->partyDetails)>0){
			 $account_id 	= $obj->partyDetails[0]->account_id;
			$start_date 	= Input::get("start_date");
			$end_date		= Input::get("end_date");
			return json_encode(DB::select(DB::raw("SELECT general_accounts.`voucher_id`, `date`, `account_id`, `against_account_id`, `dr`, `cr`, `balance`, `remark` FROM `general_accounts` JOIN (SELECT `id`, `date` FROM `vouchers` WHERE `date` between '".$start_date." 00:00:00' and '".$end_date." 23:59:00') x ON(general_accounts.voucher_id=x.id) WHERE account_id=".$account_id." ORDER BY `date`;")));

		}else{
			return "No data";
		}

	}

	public function getBalanceSheet(){

		$date = null;
		if(Input::get("date")!=null){
			$date = Input::get("date");
		}else
		 {
		 	$date = '\'00-00-00 00:00:00\'';
		 }
		 $plc = Input::get("plc");
		 if($plc!=null)
		 	return $this->getBalanceSheetOfCnfProjectLc($date, $plc);
		$array = array();
		for($i=7; $i<=57; $i++){
			$Object = new stdClass();
			$Object->id = $i;
			$childs = Utilities::getChildList($i);
			$balance = Utilities::getCurrentBalance($i, $date);
			foreach ($childs as $child) {
				$balance = $balance + Utilities::getCurrentBalance($child, $date);
			}
			$Object->totalBalance = $balance;
			$array[] = $Object;
		}
		return json_encode($array);
	}
	public function getBalanceSheetOfCnfProjectLc($date, $plc){
		$array = array();
		for($i=7; $i<=57; $i++){
			$Object = new stdClass();
			$Object->id = $i;
			$Object->balance = Utilities::getCurrentBalanceForPLC($i, $plc,  $date);
			$fChilds = Utilities::getChild_level1($i);
			$Object->children = array();
			foreach ($fChilds as  $fChild) {
				$ch = new stdClass();
				$ch->id = $fChild;
				$ch->balance = Utilities::getCurrentBalanceForPLC($fChild, $plc,  $date);
				$childs = Utilities::getChildList($fChild);
				foreach ($childs as $child) {
					$ch->balance = $ch->balance + Utilities::getCurrentBalanceForPLC($child, $plc, $date);
				}
				$Object->children[] = $ch;
			}
			$array[] = $Object;
		}
		return json_encode($array);
	}
	

	public function getTrialBalance(){
		$balance = array();
		$accounts = DB::table('accounts')->get();
		foreach ($accounts as $account) {
			$id = $account->id;
			$general_acc = DB::select(DB::raw('SELECT balance FROM `general_accounts` WHERE account_id='. $id .' order by id desc limit 1'));
			array_push($balance, array(
					'id'		=>	$account->id,
					'name'		=>	$account->name,
					'balance'	=>	$general_acc[0]->balance
				));
			
		}
		return json_encode($balance);
	}


	public function test(){
		return Utilities::getChildList(2);
	/*	$starttime = microtime(true);
		$res = Utilities::childBalance(1);
		$endtime = microtime(true);
		$duration = $endtime - $starttime;
		return $res."   ".$duration."  microseconds";*/
	}

}
