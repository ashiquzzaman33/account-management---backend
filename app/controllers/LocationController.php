<?php 

	class LocationController extends BaseController
	{
		
		public function getAllLocation(){
			$loc = DB::table('locations')->get();
			return json_encode($loc);
		}
		public function addLocation(){
			$name 				=	Input::get('name');
			$details 			=	Input::get('details');

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				    DB::table('locations')->insert(array(
							'name' 			=> $name,
							'details' 		=> $details,
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
		public function editLocation(){
			$id       =  Input::get('id');
			$name 	  =  Input::get('name');
			$details  =  Input::get('details');

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
				   	DB::table('locations')
           				->where('id', $id)
            			->update(array('name' => $name, 'details' => $details));
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
 ?>