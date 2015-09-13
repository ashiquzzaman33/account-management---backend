<?php

class AdminController extends BaseController{
	public function getLogin(){
		return View::make('login');
	}

	public function postLogin(){
		$username = Input::get('username');
		$password = Input::get('password');

		$user = DB::select(DB::raw("select * from users where username='". $username ."' and password='". $password ."'"));
		if($user){
			Session::put('user_id', $user[0]->id);
			return Redirect::route('getDashboard');
		}else{
			return "please enter correct username and password";
		}
	}

	public function getLogout(){
		Session::forget('user_id');
		return Redirect::route('getLogin');
	}

	public function getDashboard(){
		return View::make('dashboard');
	}

	public function getLedgerReport(){
		return View::make('ledger_report');
	}

	public function getAdminTrialBalance(){
		return View::make('TrialBalance');
	}
	public function getAdminPartyReport(){
		return View::make('PartyReport');
	}

	public function getViewTransaction(){
		return View::make('ViewTransaction');
	}
	public function getTransaction(){
		$date = Input::get('date');
		$transaction = DB::table('vouchers')->where('date', $date)->get();
		$result = array();
		foreach ($transaction as $t) {
			$narr = $t->narration;
			$ledgers = DB::table('general_accounts')->where('voucher_id', $t->id)->get();
			foreach($ledgers as $l){
				$acc_id = $l->account_id;
				$dr = $l->dr;
				$cr = $l->cr;
				array_push($result, array(
						'narration'		=>	$narr,
						'account_id'	=>	$acc_id,
						'dr'			=>	$dr,
						'cr'			=>	$cr,
						'location'		=>	$t->location_id
					));
			}
		}
		return json_encode($result);
	}

	public function getDeleteUser(){
		return View::make('DeleteUser');
	}

	public function postDeleteUser(){
		$id = Input::get('user');
		DB::select(DB::raw('delete from users where id='.$id));
		Session::flash('msg', 'user has been deleted successfully');
		return Redirect::route('getDeleteUser');
	}

	public function getChangePassword(){
		return View::make('ChangePassword');
	}

	public function postChangePassword(){
		$user = Input::get('user');
		$pass = Input::get('password');
		$auth = Input::get('auth_password');

		try{

			$admin = DB::table('users')->where('username', 'admin')->first();
			if($admin->password == $auth){
				DB::table('users')->where('id', $user)->update(array(
						'password'	=>	$pass
					));
				Session::flash('msg', 'Password has been changed successfully');
				return Redirect::route('getChangePassword');
			}else{
				Session::flash('error', 'Authorization password is wrong. Please try again with correct password');
				return Redirect::route('getChangePassword');
			}

		}catch(\Exception $e){
			Session::flash('error', 'Something is wrong. Please try again with correct information');
			return Redirect::route('getChangePassword');
		}
	}

}