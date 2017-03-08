<?php

class UsersController extends BaseController {

	/**
	 * User Repository
	 *
	 * @var User
	 */
	protected $user;

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

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$input['password'] = Hash::make($input['password']);
			$this->user->create($input);
			return Redirect::route('users.index');
		}

		return Redirect::route('users.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->findOrFail($id);

		return View::make('users.show', compact('user'));
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

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$user = $this->user->find($id);
			$user->update($input);

			return Redirect::route('users.show', $id);
		}

		return Redirect::route('users.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
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

		return Redirect::route('users.index');
	}


	public function dashboard(){
		return View::make('pages.dashboard');
	}

	public function comparedata()
	{
		return View::make('pages.comparedata');	
	}

	public function updateprofile()
	{
		$id = Auth::User()->id;
		$user = $this->user->find($id);
		if (is_null($user))
		{
			return Redirect::route('users.index');
		}
		return View::make('pages.updateprofile', compact('user'));
	}

	public function getUpdateProfileRest($id)
	{
		$user = $this->user->find($id);
		return $this->sendSuccessResponse($user,Lang::get('messages.success'),"updateprofile");

	}

	public function doRestUpdateProfile($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$user = $this->user->find($id);
			$user->update($input);
			return $this->sendSuccessResponse($user,Lang::get('messages.updateprofile'),"dashboard");
		}
		
		return $this->sendErrorResponse($input,$validation->messages(),Lang::get('messages.invaliddata'),'updateprofile');
	}











	public function updateprofilelogged()
	{
		$id = Auth::User()->id;
		$user = $this->user->find($id);
		if (is_null($user))
		{
			return Redirect::route('dashboard');
		}
		return View::make('users.updateprofile', compact('user'));
	}

	public function doUpdateprofile($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$user = $this->user->find($id);
			$user->update($input);

			return Redirect::route('dashboard');
		}

		return Redirect::route('getupdateprofile', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function login()
	{
		if (Auth::guest())
		{
			return View::make('pages.login');	
		}
		else{
			return Redirect::route('dashboard');
		}
		
	}


	public function register()
	{
		if (Auth::guest())
		{
			return View::make('pages.register');	
		}
		else{
			return Redirect::route('dashboard');
		}
		
	}

	public function doRegister()
	{
		$input = Input::all();
		
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$input['password'] = Hash::make($input['password']);
			$this->user->create($input);

			return Redirect::route('dashboard')->with('message', 'Succfully Registered!');;
		}

		return Redirect::route('register')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function doRestRegister()
	{
		$input = Input::all();
		
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$input['password'] = Hash::make($input['password']);
			$this->user->create($input);
			return $this->sendSuccessResponse($input,Lang::get('messages.registered'),"index");
		}

		return $this->sendErrorResponse($input,$validation->messages(),Lang::get('messages.invaliddata'),'register');
	}

	
	public function doLogin()
	{
		$rules = array(
	    'email'    => 'required|email', // make sure the email is an actual email
	    'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
	    );

	// run the validation rules on the inputs from the form
			$validator = Validator::make(Input::all(), $rules);

	// if the validator fails, redirect back to the form
		if ($validator->fails()) {
				return Redirect::to('login')
	        ->withErrors($validator) // send back all errors to the login form
	        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
	    } else {

	    // create our user data for the authentication
	    	$userdata = array(
	    		'email'     => Input::get('email'),
	    		'password'  => Input::get('password')
	    		);

	    // attempt to do the login

	    	if (Auth::attempt($userdata)) {

	        // validation successful!
	        // redirect them to the secure section or whatever
	        // return Redirect::to('secure');
	        // for now we'll just echo success (even though echoing in a controller is bad)
	    		if(!Auth::User()->isManager()){
	    			$userid = Auth::User()->id;
					if(!Auth::User()->isProfileUpdated()){
						return Redirect::route('getupdateprofile');
					}
					else{
						return Redirect::route('dashboard');	
					}
	    				
	    		}
	    		else{
	    			return Redirect::route('dashboard');	
	    		}
	    		

	    	} else {
	        // validation not successful, send back to form 
	    		return Redirect::back()->withErrors(array('invalid' => "Invalid Login credentials."))->withInput(Input::except('password'));;
	    	}

	    }
	}

	public function doRestLogin()
	{
		$rules = array(
	    'email'    => 'required|email',
	    'password' => 'required|min:3' 
	    );
	    $input = Input::all();
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
			return $this->sendErrorResponse($input,$validator->messages(),Lang::get('messages.invaliddata'),'index');
	    } 
	    else {
			$userdata = array(
	    		'email'     => Input::get('email'),
	    		'password'  => Input::get('password')
	    		);
			if (Auth::attempt($userdata)) {
				$userid = Auth::User()->id;
	    		$input["userid"] = $userid;
				if(!Auth::User()->isManager()){
					if(!Auth::User()->isProfileUpdated()){
						return $this->sendSuccessResponse($input,Lang::get('messages.success'),"updateprofile");
					}
					else{
						return $this->sendSuccessResponse($input,Lang::get('messages.success'),"dashboard");		
					}
	    		}
	    		else{
	    			return $this->sendSuccessResponse($input,Lang::get('messages.success'),"dashboard");		
	    		}
	    	} 
	    	else {
	    		return $this->sendErrorResponse($input,array('invalid' => "Invalid Login credentials."),Lang::get('messages.invalidlogin'),'index');
	    	}
	    }
	}

	public function logout()
	{
	    Auth::logout(); // log the user out of our application
	    return Redirect::to('login'); // redirect the user to the login screen
	}

	public function getupdatepassword($id = null ){
		if($id==null)
			$id = Auth::user()->id;
		
		return View::make('users.updatepassword',compact('id'));
	}

	public function storenewpassword($id){
		
		$rules = array(
	    'password' => 'required|min:3'
	    );
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
				return Redirect::back()->withErrors($validator);
	    } else {
	    	$user = $this->user->findOrFail($id);
	    	$user->password = Hash::make(Input::get('password'));
	    	$user->save();
			return Redirect::route('dashboard');
	    }
	}

}
