<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
	protected $hidden = array('password');
	protected $guarded = array();
	public static $rules = array(
    'firstname'	 => 'required',
    'lastname'	 => 'required',
    //'usertype'	 => 'required',
    'email'    => 'required|email', // make sure the email is an actual email
    //'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    );

    public function isManager(){
		$userrole = $this->usertype;
		if($userrole=="manager"){
			return true;
		}
		return false;
	}

	public function isProfileUpdated(){
		$dob = $this->dob;
		$weight = $this->weight;
		$height = $this->height;
		$gender = $this->gender;

		if($dob!="" && $weight!="" && $height!="" && $gender!=""){
			return true;
		}
		return false;
	}

}
