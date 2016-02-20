<?php

class PurchaseOrderController extends BaseController{

	public function createPurchaseOrder(){

			$name			=	Input::get("name");
			$address		=	Input::get("address");
			$date			=	Input::get('date');
			$content		=	Input::get("content");
			$total_price	=	Input::get("total_price");
			$shabek			=	Input::get('shabek');
			$grand_total	=	Input::get('grand_total');
			$tt_dd_cash		=	Input::get('tt_dd_cash');
			$jer			=	Input::get('jer');

		

			$currDate = date('Y:m:d', strtotime($date));
			$sql = "SELECT `id` FROM purchase_order WHERE  `name`='$name' AND `address`= '$address' AND date BETWEEN '$currDate 00:00:00' AND '$currDate 23:59:59' AND `content`='$content' AND `total_price`='$total_price' AND `shabek`='$shabek' AND `grand_total`='$grand_total' AND `tt_dd_cash`='$tt_dd_cash' AND `jer`='$jer'";
			$preCheck =	 DB::select(DB::raw($sql));
			if(sizeof($preCheck)>0)
					return json_encode(array("Status" => "Failed", "Message" => "duplicate entry"));

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				    DB::table('purchase_order')->insert(array(
							'name' 			=> $name,
							'address' 		=> $address,
							'date' 			=> $date,
							'content' 		=> $content,
							'total_price' 	=> $total_price,
							'shabek' 		=> $shabek,
							'grand_total' 	=> $grand_total,
							'tt_dd_cash' 	=> $tt_dd_cash,
							'jer' 			=> $jer,
						)
					);
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
	public function getPurchaseOrderByDate(){
			$start = Input::get('start_date');
			$end = Input::get('end_date');
			return json_encode(DB::select(DB::raw("SELECT `id`, `name`, `address`, `date`, `content`, `total_price`, `shabek`, `grand_total`, `tt_dd_cash`, `jer` FROM `purchase_order` WHERE date BETWEEN '$start  00:00:00' AND '$end 23:59:59'")));

	}

	public function editPurchaseOrder(){
			$id				=   Input::get("id");
			$name			=	Input::get("name");
			$address		=	Input::get("address");
			$date			=	Input::get('date');
			$content		=	Input::get("content");
			$total_price	=	Input::get("total_price");
			$shabek			=	Input::get('shabek');
			$grand_total	=	Input::get('grand_total');
			$tt_dd_cash		=	Input::get('tt_dd_cash');
			$jer			=	Input::get('jer');

			$sql = "UPDATE `purchase_order` SET `name`='$name',`address`='$address',`date`='$date',`content`='$content',`total_price`='$total_price',`shabek`='$shabek',`grand_total`='$grand_total',`tt_dd_cash`='$tt_dd_cash',`jer`='$jer' WHERE `id`='$id'";

		
			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				   	DB::update(DB::raw($sql));
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

	public function getLastIdOfPurchaseOrder(){
		$res = DB::select(DB::raw("select max(id) as id from purchase_order"))[0]->id;
		return $res;
	}


	
}