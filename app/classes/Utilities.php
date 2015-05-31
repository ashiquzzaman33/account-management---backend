<?php

class Utilities{

	public static function getCurrentBalance($acc_id){
		
		$var =  DB::select(DB::raw("SELECT id, account_id, balance FROM general_accounts WHERE id  IN ( SELECT MAX(id) as id FROM general_accounts WHERE account_id = ".$acc_id.")"));	
		return $var[0]->balance;	
	}

}