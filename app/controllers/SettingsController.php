<?php

class SettingsController extends BaseController{
	public function postUpdateSettings(){
		$key = Input::get('key');
		$value = Input::get('value');

		DB::table('settings')
		->where('key', $key)
		->update(array(
				'value'	=>	$value
			));

	}

	public function getSettings(){
		$settings = DB::table('settings')->get();
		return json_encode($settings);
	}
}