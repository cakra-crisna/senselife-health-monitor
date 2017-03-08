<?php

class Emergency extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'phone' => 'required',
		'address' => 'required',
		'relationship' => 'required'
	);

	public function getEmergenciesOfUser($userid)
	{
		return $this->where('created_by','=',$userid)->get();
	}
}
