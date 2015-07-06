<?php

class TestController extends BaseController{
	public function uploadImage(){
		$photo_name = time().Input::file('photo')->getClientOriginalName();
		Input::file('photo')->move('uploads', $photo_name);
		$photo_link = 'uploads/'.$photo_name;
		echo $photo_link;
	}
}