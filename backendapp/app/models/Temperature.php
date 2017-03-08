<?php

class Temperature extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'temperature' => 'required',
		'timestamp' => 'required',
		'created_by' => 'required'
	);
}
