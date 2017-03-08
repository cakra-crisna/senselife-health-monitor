<?php

class DevicesController extends BaseController {

	/**
	 * Device Repository
	 *
	 * @var Device
	 */
	protected $device;

	public function __construct(Device $device)
	{
		$this->device = $device;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$devices = $this->device->all();

		return View::make('devices.index', compact('devices'));
	}

	public function getAllDevicesRest($userid)
	{
		$devices = $this->device->getDeviceOfUser($userid);
		return $this->sendSuccessResponse($devices,Lang::get('messages.success'),"#");

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('devices.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Device::$rules);

		if ($validation->passes())
		{
			$this->device->create($input);

			return Redirect::route('devices.index');
		}

		return Redirect::route('devices.create')
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
		$device = $this->device->findOrFail($id);

		return View::make('devices.show', compact('device'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$device = $this->device->find($id);

		if (is_null($device))
		{
			return Redirect::route('devices.index');
		}

		return View::make('devices.edit', compact('device'));
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
		$validation = Validator::make($input, Device::$rules);

		if ($validation->passes())
		{
			$device = $this->device->find($id);
			$device->update($input);

			return Redirect::route('devices.index');
		}

		return Redirect::route('devices.edit', $id)
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
		$this->device->find($id)->delete();

		return Redirect::route('devices.index');
	}


	public function addNewDeviceRest($id)
	{
		$input = Input::all();
		$input["created_by"] = $id;
		Log::info($input);
		$validation = Validator::make($input, Device::$rules);
		if ($validation->passes())
		{
			$this->device->create($input);
			return $this->sendSuccessResponse($input,Lang::get('messages.deviceadded'),"devices");
		}

		return $this->sendErrorResponse($input,$validation->messages(),Lang::get('messages.invaliddata'),'devices');
	}

	public function deleteDeviceRest($id)
	{
		$this->device->find($id)->delete();
		return $this->sendSuccessResponse($id,Lang::get('messages.success'),"devices");
	}
}
