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
	public function getBalanceSheet(){
		$starttime = microtime(true);




		$firstChild = Utilities::getChildrensName(1);
		$Object = new stdClass();
		$array = array();

		foreach ($firstChild as $child) {
			$secondChild = Utilities::getChildrensName($child->id);
			$fObject = new stdClass();
			$fObject->name = $child->name;
			$fBalance = Utilities::getCurrentBalance($child->id);
			$fArray = array();
			foreach ($secondChild as $sChild) {
				$thirdChild = Utilities::getChildrensName($sChild->id);
				$sObject = new stdClass();
				$sObject->name = $sChild->name;
				$tArray = array();
				$sBalance = Utilities::getCurrentBalance($sChild->id);
				foreach ($thirdChild as $tChild) {
						$tObj = new stdClass();
						$tObj->name = $tChild->name;
						$tObj->balance = Utilities::childBalance($tChild->id);
						$sBalance+= $tObj->balance;
						$tArray[] = $tObj;
				}
				$sObject->balance = $sBalance;
				$fBalance += $sObject->balance;
				$sObject->child = $tArray;
				$fArray[] = $sObject;
				//return json_encode($sObject);
			}
			$fObject->balance = $fBalance;
			$fObject->child = $fArray;
			$array[] = $fObject;
		}

	$endtime = microtime(true);
	$duration = $endtime - $starttime;
		return json_encode($array)."   ".$duration." microseconds";
	}
	public function test(){
		$starttime = microtime(true);
		$res = Utilities::childBalance(1);
		$endtime = microtime(true);
		$duration = $endtime - $starttime;
		return $res."   ".$duration."  microseconds";
	}

}
