<?php

class DOController extends BaseController{
	public function postNewDO(){
		$date = Input::get('date');
		$customer = Input::get('customer');
		$address = Input::get('address');
		$goods = Input::get('goods');
		$qty = Input::get('qty');
		$word = Input::get('word');
		$place = Input::get('place');
		$trak = Input::get('trak');

		DB::beginTransaction();
		try{
			$id = DB::table('delivery_orders')->insertGetId(array(
				'date'		=>	$date,
				'customer'	=>	$customer,
				'address'	=>	$address,
				'goods'		=>	$goods,
				'qty'		=>	$qty,
				'word'		=>	$word,
				'place'		=>	$place,
				'trak'		=>	$trak
			));
			DB::commit();
			return $id;
		}catch(\Exception $e){

			DB::rollback();
			return 0;
		}
	}

	public function getDO(){
		$start = Input::get('start');
		$end = Input::get('end');
		return DB::table('delivery_orders')->whereBetween('date', array($start, $end))->get();
	}
}