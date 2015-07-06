<?php

class ProductController extends BaseController{
	public function postAddProducts(){
		$name = Input::get('name');
		$p_rate = Input::get('p_rate');
		$s_rate = Input::get('s_rate');

		DB::beginTransaction();
		$status 	= "Success";
		$message 	= " ";
		try {
			$id = DB::table('products')->insertGetId(array(
					'name'	=>	$name,
					'last_p_rate'	=>	$p_rate,
					'last_s_rate'	=>	$s_rate
				));
			DB::table('stockledgers')->insert(array(
				'date'	=>	'1980-01-01',
				'voucher_type'	=>	'Purchase',
				'item_id'	=>	$id,
				'quantity'	=>	'0',
				'rate'	=>	$p_rate
			));
			DB::table('stockledgers')->insert(array(
				'date'	=>	'1980-01-01',
				'voucher_type'	=>	'Sell',
				'item_id'	=>	$id,
				'quantity'	=>	'0',
				'rate'	=>	$s_rate
			));

			DB::commit();
		}
		catch(\Exception $e)
		{
				$status = "Failed";
				$message = $e;
			    DB::rollback();
		}
		$mss = array("Status" => $status, "Message" => $message);
		return json_encode($mss);


	}

	public function getAllProducts(){
		$products = DB::table('products')->get();
		return json_encode($products);
	}

	public function postProductsLedger(){
		$voucher_type = Input::get('voucher_type');
		$date = Input::get('date');
		$products = json_decode(Input::get('products'));

		foreach ($products as $p) {
			DB::table('stockLedgers')->insert(array(
					'date'			=>	$date,
					'voucher_type'	=>	$voucher_type,
					'item_id'		=>	$p->id,
					'quantity'		=>	$p->quantity,
					'rate'			=>	$p->rate
				));
			if($voucher_type == 'Purchase'){
				$list = DB::table('products')->where('id',$p->id)->first();
				$p_qty 			= $list->p_qty + $p->quantity;
				$last_p_rate 	= $p->rate;
				$avg_p_rate		= (($list->p_qty * $list->avg_p_rate) + ($p->quantity * $p->rate)) / ($list->p_qty + $p->quantity);

				DB::table('products')->where('id', $p->id)->update(array(
						'p_qty'			=>	$p_qty,
						'last_p_rate'	=>	$last_p_rate,
						'avg_p_rate'	=>	$avg_p_rate
					));
			}else{
				$list = DB::table('products')->where('id',$p->id)->first();
				$s_qty 			= $list->s_qty + $p->quantity;
				$last_s_rate 	= $p->rate;
				$avg_s_rate		= (($list->s_qty * $list->avg_s_rate) + ($p->quantity * $p->rate)) / ($list->s_qty + $p->quantity);
				
				DB::table('products')->where('id', $p->id)->update(array(
						's_qty'			=>	$s_qty,
						'last_s_rate'	=>	$last_s_rate,
						'avg_s_rate'	=>	$avg_s_rate
					));
			}


		}
	}
}