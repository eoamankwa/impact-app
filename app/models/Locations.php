<?php

class Locations extends \Eloquent {
	protected $fillable = [];

	/**
	 * Set parent as profile
	 *
	 * @return object profile
	 */
	public function profile() {

		return $this->belongsTo('profile');
	}
}
