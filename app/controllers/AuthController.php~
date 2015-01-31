<?php

class AuthController extends BaseController {
	
	public function status() {
		return Response::json(Auth::check());
	}

	public function secrets() {
		if(Auth::check()) {
			return'You are logged function';
		} else {
			return 'You are not logged out';
		}
	}

	public function login() {
		
		if(Auth::attempt(array('email'=> Input::json('email'), 'password'=>Input::json('password')))) {
			return Response::json(Auth::user());
		} else {
			return Response::json(array('flash' => 'Invalid email or password'));
		}
	}

	public function logout() {
		Auth::logout();
		return Response::json(array('flash'=>'Logged Out'));
	}
}
