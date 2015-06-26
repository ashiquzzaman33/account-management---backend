<?php

class Utilities{

	public static function getCurrentBalance($acc_id){
		
		$var =  DB::select(DB::raw("SELECT id, account_id, balance FROM general_accounts WHERE id  IN ( SELECT MAX(id) as id FROM general_accounts WHERE account_id = ".$acc_id.")"));	
		return $var[0]->balance;	
	}
	public static function getChildrensId($acc_id){
		$var =  DB::select(DB::raw("SELECT children FROM childrens WHERE parent=".$acc_id." AND children !=".$acc_id));
		$arr = array();
		foreach ($var as $v) {
			$arr[] = $v->children;
		}
		return $arr;
	}
	public static function getChildrensName($acc_id){
		return DB::select(DB::raw("SELECT accounts.id, accounts.name FROM accounts JOIN (SELECT children FROM childrens WHERE
		 parent=".$acc_id." AND children !=".$acc_id.") AS  New WHERE New.children=accounts.id;"));
	}
	private static function getRecursiveChildren($acc_id){
		$res = Utilities::getChildrensId($acc_id);
		$size = count($res);
		$temp = array();
		if($size>0)
		{

			foreach ($res as $r) 
			{
				$temp = array_merge($temp, Utilities::getRecursiveChildren($r));
			}
		}
		return array_merge($res, $temp);
	}
	public static function childBalance($acc_id){
		$acc_id = 1;
		$arr = Utilities::getChildrensRecursively($acc_id);
		$len = count($arr);
		$bal = Utilities::getCurrentBalance($acc_id);
		$ch = array();
		for($i=0; $i<$len; $i++) {
			$bal += Utilities::getCurrentBalance($arr[$i]);
		}
		return $bal;
	}
	private static function getChildrensRecursively($acc_id){
		$arr =  Utilities::getRecursiveChildren($acc_id);
		$arr = array_unique($arr);
		sort($arr);
		return $arr;
	}

}