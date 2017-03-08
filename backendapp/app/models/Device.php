<?php

class Device extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'devicetype' => 'required',
		'devicename' => 'required',
		'deviceid' => 'required',
		'created_by' => 'required'
	);

	public function getDeviceOfUser($userid)
	{
		return $this->where('created_by','=',$userid)->get();
	}
}
