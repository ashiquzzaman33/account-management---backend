<?php

class SalaryVoucherController extends BaseController{

	public function createSalaryVoucher(){

		//	$id					=	Input::get("id");
			$date				=	Input::get("date");
			$section			=	Input::get('section');
			$party_name			=	Input::get("party_name");

			$basis_on_or_date	=	Input::get("basis_on_or_date");
			$amount_in_words	=	Input::get('amount_in_words');
			$basic_salary		=	Input::get('basic_salary');
			$presence			=	Input::get('presence');

			$total1				=	Input::get('total1');
			$others				=	Input::get("others");
			$total2				=	Input::get("total2");
			$advance			=	Input::get('advance');

			$fine				=	Input::get("fine");
			$apron_or_mask		=	Input::get("apron_or_mask");
			$other_deduction	=	Input::get('other_deduction');
			$grand_total		=	Input::get('grand_total');
	
		

			$currDate = date('Y:m:d', strtotime($date));
			$sql = "SELECT `id` FROM salary_voucher WHERE date BETWEEN '$currDate 00:00:00' AND '$currDate 23:59:59' AND `section`='$section' AND `party_name`='$party_name' AND `basis_on_or_date` ='$basis_on_or_date' AND `amount_in_words` ='$amount_in_words' AND `basic_salary`='$basic_salary' AND `presence`='$presence' AND  `total1`='$total1' AND `others`='$others' AND `total2`='$total2' AND  `advance`='$advance' AND `fine`='$fine' AND `apron_or_mask`='$apron_or_mask' AND `other_deduction`='$other_deduction' AND `grand_total`='$grand_total';";

			$preCheck =	 DB::select(DB::raw($sql));
			if(sizeof($preCheck)>0)
					return json_encode(array("Status" => "Failed", "Message" => "duplicate entry"));

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				    DB::table('salary_voucher')->insert(array(
							'date' 				=> $date,
							'section' 			=> $section,
							'party_name' 		=> $party_name,

							'basis_on_or_date' 	=> $basis_on_or_date,
							'amount_in_words' 	=> $amount_in_words,
							'basic_salary' 		=> $basic_salary,
							'presence' 			=> $presence,

							'total1' 			=> $total1,
							'others' 			=> $others,
							'total2' 			=> $total2,
							'advance' 			=> $advance,


							'fine' 				=> $fine,
							'apron_or_mask' 	=> $apron_or_mask,
							'other_deduction' 	=> $other_deduction,
							'grand_total' 		=> $grand_total,
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
	public function getSalaryVoucherByDate(){
			$start = Input::get('start_date');
			$end = Input::get('end_date');
			return json_encode(DB::select(DB::raw("SELECT `id`, `date`, `section`, `party_name`, `basis_on_or_date`, `amount_in_words`, `basic_salary`, `presence`, `total1`, `others`, `total2`, `advance`, `fine`, `apron_or_mask`, `other_deduction`, `grand_total` FROM `salary_voucher` WHERE date BETWEEN '$start  00:00:00' AND '$end 23:59:59'")));

	}

	public function editSalaryVoucher(){
			$id					=	Input::get("id");
			$date				=	Input::get("date");
			$section			=	Input::get('section');
			$party_name			=	Input::get("party_name");

			$basis_on_or_date	=	Input::get("basis_on_or_date");
			$amount_in_words	=	Input::get('amount_in_words');
			$basic_salary		=	Input::get('basic_salary');
			$presence			=	Input::get('presence');

			$total1				=	Input::get('total1');
			$others				=	Input::get("others");
			$total2				=	Input::get("total2");
			$advance			=	Input::get('advance');

			$fine				=	Input::get("fine");
			$apron_or_mask		=	Input::get("apron_or_mask");
			$other_deduction	=	Input::get('other_deduction');
			$grand_total		=	Input::get('grand_total');



			$sql = "UPDATE `salary_voucher` SET `date`='$date',`section`='$section',`party_name`='$party_name',`basis_on_or_date`='$basis_on_or_date',`amount_in_words`='$amount_in_words',`basic_salary`='$basic_salary',`presence`='$presence',`total1`='$total1',`others`='$others',`total2`='$total2',`advance`='$advance',`fine`='$fine',`apron_or_mask`='$apron_or_mask',`other_deduction`='$other_deduction',`grand_total`='$grand_total' WHERE `id` = '$id';";

		
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


	
}