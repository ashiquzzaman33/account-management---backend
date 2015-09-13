<?php

class LoginController extends BaseController{
	public function postLogin(){
		$username = Input::get('username');
		$password = Input::get('password');

		$user = DB::select(DB::raw("select * from users where username='". $username ."' and password='". $password ."'"));
		if(count($user) == 0){
			return json_encode($user);
		}else{
			return json_encode($user);
		}
		
	}
}