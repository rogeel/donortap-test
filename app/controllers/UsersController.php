<?php
 
class UsersController extends BaseController {
 	protected $layout = "layouts.main";

 	
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	public function getLogin() {
	    $this->layout->content = View::make('users.login');
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			$id = Auth::user()->id;
			$currentuser = User::find($id);
			if($currentuser->user_type==2){
				return Redirect::to('dashboard/leads')
				->with('message', 'You are a candidate')
				->with('class', 'bg-success');
			}else{
				return Redirect::to('admin/dashboard')
				->with('message', 'You are a candidate')
				->with('class', 'bg-success');
			}			
		} else {
			return Redirect::to('users/login')
				->with('message', 'Your username/password combination was incorrect')
				->with('class', 'bg-danger')
				->withInput();
		}
	}


	
	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
}
