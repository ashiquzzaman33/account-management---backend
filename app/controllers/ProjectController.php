<?php

class ProjectController extends BaseController {

	public function createProject(){

			DB::beginTransaction();
			$status 	= "Success";
			$message 	= " ";
			try {
					DB::table('projects')->insert(array(
						'name' 				=>	Input::get('name'),
						'investment' 		=>	Input::get('investment'),
						'related_party' 	=>	Input::get('related_party'),
						'starting_date' 	=>	Input::get('starting_date'),
						'operation_date' 	=>	Input::get('operation_date'),
						'dimilish_date' 	=>	Input::get('dimilish_date'),
						'type' 				=>	Input::get('type'),
						'location_id' 				=>	Input::get('location_id')
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
	public function getAllProject()
	{
		return json_encode(DB::select(DB::raw("SELECT (id+".Constant::PROJECT_BASE.") as id, `name`, `investment`, `related_party`, `starting_date`, `operation_date`, `dimilish_date`, `type`, `location_id`, `alarm` FROM `projects` WHERE 1")));

	}

}
