<?php

class Utilities{

	public static function getCurrentBalance($acc_id){
		
		$var =  DB::select(DB::raw("SELECT id, account_id, balance FROM general_accounts WHERE id  IN ( SELECT MAX(id) as id FROM general_accounts WHERE account_id = ".$acc_id.")"));	
		return $var[0]->balance;	
	}
	public static function getParentListFromAllChilds($acc_id){
		$var = DB::table("all_childs")->select("children")->where('parent', $acc_id)->get();
		$arr = array();
		foreach ($var as $v) {
			$arr[] = $v->children;
		}
		return $arr;
	}

	private static function getParentList($acc_id){
		$arr = array();
		while(!is_null(($var =  DB::table('childrens')->select('parent')->where('children', $acc_id)->pluck('parent'))))
		{
			if($var==1)
				break;
			$arr [] = $var;
			$acc_id = $var;
			
		}
		return $arr;

	}

	public static function getChildrensName($acc_id){
		return DB::select(DB::raw("SELECT accounts.id, accounts.name FROM accounts JOIN (SELECT children FROM childrens WHERE
		 parent=".$acc_id." AND children !=".$acc_id.") AS  New WHERE New.children=accounts.id;"));
	}



}