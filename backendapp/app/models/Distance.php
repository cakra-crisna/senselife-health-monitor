<?php

class Distance extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'distance' => 'required',
		'timestamp' => 'required',
		'created_by' => 'required'
	);
}
