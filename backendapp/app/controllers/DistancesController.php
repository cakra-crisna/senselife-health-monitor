<?php

class DistancesController extends BaseController {

	/**
	 * Distance Repository
	 *
	 * @var Distance
	 */
	protected $distance;

	public function __construct(Distance $distance)
	{
		$this->distance = $distance;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$distances = $this->distance->all();

		return View::make('distances.index', compact('distances'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('distances.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Distance::$rules);

		if ($validation->passes())
		{
			$this->distance->create($input);

			return Redirect::route('distances.index');
		}

		return Redirect::route('distances.create')
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
		$distance = $this->distance->findOrFail($id);

		return View::make('distances.show', compact('distance'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$distance = $this->distance->find($id);

		if (is_null($distance))
		{
			return Redirect::route('distances.index');
		}

		return View::make('distances.edit', compact('distance'));
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
		$validation = Validator::make($input, Distance::$rules);

		if ($validation->passes())
		{
			$distance = $this->distance->find($id);
			$distance->update($input);

			return Redirect::route('distances.show', $id);
		}

		return Redirect::route('distances.edit', $id)
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
		$this->distance->find($id)->delete();

		return Redirect::route('distances.index');
	}

}
