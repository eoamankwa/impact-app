<?php
class SessionsController extends BaseController{

	public function create() {

		return View::make('sessions.create');
	}

	public function store() {
		$user = Input::only('email', 'password');
		if(Auth::attempt(Input::only('email', 'password'))) 
		{
			$user = Auth::user();
			return Redirect::to('profile');
		}

		return 'Failed';
	}
}
