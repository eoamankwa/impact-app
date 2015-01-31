<?php

class Profile extends \Eloquent {
	protected $fillable = [];

	public function user() {
		return $this->belongsTo('User');
	}

	/**
	 * Set clild as locations
	 *
	 * @return object locations
	 */
	public function locations() {
		return $this->hasMany('locations');
	}

	/**
	 * Set clild as contacts
	 *
	 * @return object contacts
	 */
	public function locations() {
		return $this->hasMany('contacts');
	}


	
	

}
