<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.default';


	public function login(){
		$this->layout->content = View::make('login');
	}


	public function doLogin(){

		$email = Input::get('email');
		$password = Input::get('password');

		if(Auth::attempt(array('email' => $email, 'password' => $password))){
		    return Redirect::intended('admin');
		}

		return Redirect::to('/login')
			->with('message', array('type' => 'danger', 'text' => 'Incorrect login credentials.'));
	}

}
