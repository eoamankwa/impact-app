<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * Set profile as a child of user
	 *
	 * @return object profile
	 */
	public function profile() {
		return $this->hasOne('Profile');
	}
	/**
	 * Set the timestamps used by the model
	 *
	 * @var boolean
	 */
	public $timestamps = true;

	/**
	 * Set attributes against mass assignment
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password', 'type'];

	/**
	 * Set attributes for validations rules
	 *
	 * @var array
	 */
	public $rules = [
			  'username'=>'required',
			  'email'=>'required',
			  'password'=>'required',
			  'type'=>'required'
			];

	/**
	 * Declare validations messages
	 *
	 * @var string
	 */
	public $messages;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/**
	 * Validate attributes
	 *
	 * @return boolean
	 */
	public function isValid() 
	{
		$validation = Validator::make($this->attributes, $this->rules);
		if($validation->passes()) return true;
		$this->messages = $validation->messages();
		return false;	
	}
}
