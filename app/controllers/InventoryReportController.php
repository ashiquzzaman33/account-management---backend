<?php

class InventoryReportController extends BaseController{

	public function getStockReport(){
		$start = Input::get('start');
		$end = Input::get('end');


		$products = DB::select(DB::raw("select t5.item_id,t5.opening_qty as opening_qty,t5.opening_price as opening_price,t5.p_qty as p_qty,t5.p_price as p_price,t6.quantity as s_qty,t6.price as s_price from (select t3.item_id,t3.opening_qty as opening_qty,t3.opening_price as opening_price,t4.quantity as p_qty,t4.price as p_price from (select t1.item_id as item_id,(t1.quantity-t2.quantity) as opening_qty,(t1.quantity-t2.quantity)*t1.price/t1.quantity as opening_price from (select item_id,sum(quantity) as quantity, sum(quantity*rate) as price from stockledgers where date<'". $start ."' and voucher_type='Purchase'  group by item_id) t1 join (select item_id,sum(quantity) as quantity, sum(quantity*rate) as price from stockledgers where date<'". $start ."' and voucher_type='Sell'  group by item_id) t2 on t1.item_id=t2.item_id) t3 left join (select item_id,sum(quantity) as quantity,sum(quantity*rate) as price from stockledgers where voucher_type='Purchase' and date between '". $start ."' and '". $end ."' group by item_id) t4 on t3.item_id=t4.item_id)t5 left join (select item_id,sum(quantity) as quantity,sum(quantity*rate) as price from stockledgers where voucher_type='Sell' and date between '". $start ."' and '". $end ."' group by item_id) t6 on t5.item_id=t6.item_id"));

		return json_encode($products);
	}

	public function getSingleProductSellPurchaseReport(){
		$id = Input::get('id');
		$start = Input::get('start');
		$end = Input::get('end');
		$dates = DB::select(DB::raw("SELECT distinct(date) FROM `stockledgers` where date between '". $start ."' and '". $end ."' and item_id=".$id));
		$report = array();
		foreach ($dates as $date) {
			$purchase = DB::select(DB::raw("select sum(quantity) as qty,sum(rate*quantity)/sum(quantity) as rate,sum(rate*quantity) as total from stockledgers where date='". $date->date ."' and item_id=". $id ." and voucher_type='Purchase'"));

			$sell = DB::select(DB::raw("select sum(quantity) as qty,sum(rate*quantity)/sum(quantity) as rate,sum(rate*quantity) as total from stockledgers where date='". $date->date ."' and item_id=". $id ." and voucher_type='Sell'"));
			array_push($report,array(
					'date'		=>	$date->date,
					'p_qty'		=>	$purchase[0]->qty,
					'p_rate'	=>	$purchase[0]->rate,
					'p_total'	=>	$purchase[0]->total,
					's_qty'		=>	$sell[0]->qty,
					's_rate'	=>	$sell[0]->rate,
					's_total'	=>	$sell[0]->total,
				));
		}
		return json_encode($report);
	}

	public function getAllProductSellPurchaseReport(){
		$start = Input::get('start');
		$end = Input::get('end');

		$products = DB::table('products')->get();
		/*$res = DB::select(DB::raw("select sum(quantity*rate) - t1.total_sell * (sum(quantity*rate) / sum(quantity)) as closing_stock from stockledgers,(select sum(quantity) as total_sell from stockledgers where item_id=8 and date<'2015-07-05' and voucher_type='Sell') as t1 where item_id=8 and date<'2015-07-05' and voucher_type='Purchase'"));
			echo $res[0]->closing_stock;*/
		$response = array();
		foreach ($products as $p) {
			$res = DB::select(DB::raw("select sum(quantity*rate) - t1.total_sell * (sum(quantity*rate) / sum(quantity)) as closing_stock from stockledgers,(select sum(quantity) as total_sell from stockledgers where item_id=". $p->id ." and date<'". $start ."' and voucher_type='Sell') as t1 where item_id=". $p->id ." and date<'". $start ."' and voucher_type='Purchase'"));
			$res2 = DB::select(DB::raw("select sum(quantity) as p_qty,sum(quantity*rate) as total_p, (sum(quantity*rate) / sum(quantity)) as p_rate,t1.total_sell_qty as total_sell_qty,t1.s_rate as s_rate,t1.total_sell as total_sell from stockledgers,(select sum(quantity) as total_sell_qty,(sum(quantity*rate) / sum(quantity)) as s_rate,sum(quantity*rate) as total_sell from stockledgers where item_id=". $p->id ." and date between '". $start ."' and '". $end ."' and voucher_type='Sell') as t1 where item_id=". $p->id ." and date between '". $start ."' and '". $end ."' and voucher_type='Purchase'"));
			array_push($response, array(
					'id'	=>	$p->id,
					'name'	=>	$p->name,
					'ob'	=>	$res[0]->closing_stock,
					'p_qty'	=>	$res2[0]->p_qty,
					'p_rate'	=>	$res2[0]->p_rate,
					'p_total'	=>	$res2[0]->total_p,
					's_qty'	=>	$res2[0]->total_sell_qty,
					's_rate'	=>	$res2[0]->s_rate,
					's_total'	=>	$res2[0]->total_sell,
				));
		}
		return json_encode($response);
	}

	public function getPurchaseLedger(){
		$id = Input::get('id');
		$start = Input::get('start');
		$end = Input::get('end');

		$res = DB::select(DB::raw("select date,quantity,rate from stockledgers where voucher_type='Purchase' and item_id=". $id ." and date between '". $start ."' and '". $end ."'"));
		return json_encode($res);

	}

	public function getSellLedger(){
		$id = Input::get('id');
		$start = Input::get('start');
		$end = Input::get('end');

		$res = DB::select(DB::raw("select date,quantity,rate from stockledgers where voucher_type='Sell' and item_id=". $id ." and date between '". $start ."' and '". $end ."'"));
		return json_encode($res);
	}

}