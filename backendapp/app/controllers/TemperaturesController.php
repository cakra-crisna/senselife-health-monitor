<?php

class TemperaturesController extends BaseController {

	/**
	 * Temperature Repository
	 *
	 * @var Temperature
	 */
	protected $temperature;

	public function __construct(Temperature $temperature)
	{
		$this->temperature = $temperature;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$temperatures = $this->temperature->all();

		return View::make('temperatures.index', compact('temperatures'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('temperatures.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Temperature::$rules);

		if ($validation->passes())
		{
			$this->temperature->create($input);

			return Redirect::route('temperatures.index');
		}

		return Redirect::route('temperatures.create')
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
		$temperature = $this->temperature->findOrFail($id);

		return View::make('temperatures.show', compact('temperature'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$temperature = $this->temperature->find($id);

		if (is_null($temperature))
		{
			return Redirect::route('temperatures.index');
		}

		return View::make('temperatures.edit', compact('temperature'));
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
		$validation = Validator::make($input, Temperature::$rules);

		if ($validation->passes())
		{
			$temperature = $this->temperature->find($id);
			$temperature->update($input);

			return Redirect::route('temperatures.show', $id);
		}

		return Redirect::route('temperatures.edit', $id)
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
		$this->temperature->find($id)->delete();

		return Redirect::route('temperatures.index');
	}

}
