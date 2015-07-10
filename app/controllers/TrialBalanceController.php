<?php

class TrialBalanceController extends BaseController{
	public $trial_balance_acc_list = array();

	public function getSortedTrialBalance(){
		$max_id = DB::select(DB::raw("select max(id) as max_id from accounts"))[0]->max_id;
		$accounts = DB::select(DB::raw("select id,parent,name from accounts"));
		$accounts_tree = array();
		for($i = 1; $i<=$max_id; $i++){
			$accounts_tree[$i] = array(
					'id'	=>	$i,
					'children'	=>	array()
				);
		}
		for($i=$max_id; $i>1; $i--){
			$parent = Utilities::getParent($i, $accounts);
			if($parent && $accounts_tree[$i]){
				array_push($accounts_tree[$parent]['children'], $accounts_tree[$i]);
			}
		}
		$finalTrialAcc = array();
		array_push($finalTrialAcc, $accounts_tree[1]['children'][4]);
		array_push($finalTrialAcc, $accounts_tree[1]['children'][3]);
		array_push($finalTrialAcc, $accounts_tree[1]['children'][2]);
		array_push($finalTrialAcc, $accounts_tree[1]['children'][1]);
		array_push($finalTrialAcc, $accounts_tree[1]['children'][0]);
		$this->makeTree($finalTrialAcc);
		return json_encode($this->trial_balance_acc_list);
	}

	public function makeTree($a){
		foreach ($a as $acc) {
			array_push($this->trial_balance_acc_list, $acc['id']);
			$this->makeTree($acc['children']);
		}
	}
}