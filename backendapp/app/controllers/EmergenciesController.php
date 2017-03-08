<?php

class EmergenciesController extends BaseController {

	/**
	 * Emergency Repository
	 *
	 * @var Emergency
	 */
	protected $emergency;

	public function __construct(Emergency $emergency)
	{
		$this->emergency = $emergency;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$emergencies = $this->emergency->all();

		return View::make('emergencies.index', compact('emergencies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('emergencies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Emergency::$rules);

		if ($validation->passes())
		{
			$this->emergency->create($input);

			return Redirect::route('emergencies.index');
		}

		return Redirect::route('emergencies.create')
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
		$emergency = $this->emergency->findOrFail($id);

		return View::make('emergencies.show', compact('emergency'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$emergency = $this->emergency->find($id);

		if (is_null($emergency))
		{
			return Redirect::route('emergencies.index');
		}

		return View::make('emergencies.edit', compact('emergency'));
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
		$validation = Validator::make($input, Emergency::$rules);

		if ($validation->passes())
		{
			$emergency = $this->emergency->find($id);
			$emergency->update($input);

			return Redirect::route('emergencies.show', $id);
		}

		return Redirect::route('emergencies.edit', $id)
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
		$this->emergency->find($id)->delete();

		return Redirect::route('emergencies.index');
	}

	public function getallemergencyRest($id)
	{
		$emergencys = $this->emergency->getEmergenciesOfUser($id);
		return $this->sendSuccessResponse($emergencys,Lang::get('messages.success'),"#");
	}

	

}
