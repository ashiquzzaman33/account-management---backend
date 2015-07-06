<?php

class Utilities{

	public static function getCurrentBalance($acc_id, $dt=null){
		//query:  SELECT general_accounts.id, balance FROM general_accounts JOIN (SELECT max(general_accounts.`id`) AS id FROM `general_accounts` JOIN (SELECT vouchers.id, vouchers.date FROM vouchers WHERE vouchers.date >= '2015-06-10 00:00:00') x ON general_accounts.voucher_id = x.id WHERE general_accounts.account_id = 7)P ON general_accounts.id = P.id;
		//$var =  DB::select(DB::raw("SELECT id, account_id, balance FROM general_accounts WHERE id  IN ( SELECT MAX(id) as id FROM general_accounts WHERE account_id = ".$acc_id.")"));	
		
		$date = null;
		if($dt!=null){
			$date = $dt;
		}else{
		 	$date = '\'00-00-00 00:00:00\'';
		 }
		// return $date."  ". $acc_id;
		$var =  DB::select(DB::raw(
			"SELECT general_accounts.id,
			 balance FROM general_accounts JOIN 
			 (SELECT max(general_accounts.`id`) AS id FROM `general_accounts` JOIN
			  (SELECT vouchers.id, vouchers.date FROM vouchers WHERE vouchers.date <= ".$date.") 
			  x ON general_accounts.voucher_id = x.id WHERE general_accounts.account_id = ".$acc_id.") P
			   ON general_accounts.id = P.id;"));	
		return isset($var[0])? $var[0]->balance: 0;	
	}

	public static function getCurrentBalanceForPLC($acc_id, $plc, $dt=null){
		//query:  SELECT general_accounts.id, balance FROM general_accounts JOIN (SELECT max(general_accounts.`id`) AS id FROM `general_accounts` JOIN (SELECT vouchers.id, vouchers.date FROM vouchers WHERE vouchers.date >= '2015-06-10 00:00:00') x ON general_accounts.voucher_id = x.id WHERE general_accounts.account_id = 7)P ON general_accounts.id = P.id;
		//$var =  DB::select(DB::raw("SELECT id, account_id, balance FROM general_accounts WHERE id  IN ( SELECT MAX(id) as id FROM general_accounts WHERE account_id = ".$acc_id.")"));	
		
		$date = null;
		if($dt!=null){
			$date = $dt;
		}else{
		 	$date = '\'00-00-00 00:00:00\'';
		 }
		// return $date."  ". $acc_id;
		$var =  DB::select(DB::raw(
			"SELECT general_accounts.id,
			 balance FROM general_accounts JOIN 
			 (SELECT max(general_accounts.`id`) AS id FROM `general_accounts` JOIN
			  (SELECT vouchers.id, vouchers.date FROM vouchers WHERE vouchers.date <= ".$date." and project_or_cnf_or_lc=".$plc.") 
			  x ON general_accounts.voucher_id = x.id WHERE general_accounts.account_id = ".$acc_id.") P
			   ON general_accounts.id = P.id;"));	
		return isset($var[0])? $var[0]->balance: 0;	
	}

	public static function getChildList($acc_id){
		$var = DB::table("all_childs")->select("children")->where('parent', $acc_id)->get();
		$arr = array();
		foreach ($var as $v) {
			$arr[] = $v->children;
		}
		return $arr;
	}
	public static function getChild_level1($acc_id){
		$arr = array();
		$childrens = DB::table('childrens')->select('children')->where('parent', $acc_id)->where('children', '!=', $acc_id)->get();
		foreach ($childrens as $child) {
			$arr[] = $child->children;
		}
		return $arr;
	}

	public static function getParentList($acc_id){
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


	public static function getProjectOrCnFOrLcType($id){
		$ob = new stdClass();
		if($id>Constant::LC_BASE){
			$ob->type = "LC";
			$ob->id   = $id - Constant::LC_BASE;			
		}else if($id>Constant::CNF_BASE){
			$ob->type = "CNF";
			$ob->id   = $id - Constant::CNF_BASE;
		}else if($id>Constant::PROJECT_BASE){
			$ob->type = "PROJECT";
			$ob->id   = $id - Constant::PROJECT_BASE;
		}else{
			$ob->type = "NONE";
			$ob->id = 0;
		} 
		return json_encode($ob);    
	}





}