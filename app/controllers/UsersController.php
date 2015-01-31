<?php

class UsersController extends \BaseController {

	/**
	 * The User object
	 *
	 * @var object
	 */
	protected $user;

	/**
	 * The constructor
	 *
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();
		return Response::json($users, 200);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		 return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array();
		$input['username'] = Input::get('username');
		$input['email'] = Input::get('email');
		$input['password'] = Hash::make(Input::get('password'));
		$input['type'] = Input::get('type');
		if(!$this->user->fill($input)->isvalid())
		{
			return Redirect::back()->withInput()->withErrors($this->user->messages);
		}
			$this->user->save();
			//return Redirect::route('users.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		$users = $this->user->whereUsername($username)->first();
		return Response::json($users, 200);
		//return View::make('users.show', ['user' => $user]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);
		return View::make('users.edit', ['users' => $user]);
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$user = $this->user->find(2);
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->type = Input::get('type');
		$user->save();
		//return Redirect::route('users.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->find($id)->delete();
		//return Redirect::route('users.index');
	}


}
