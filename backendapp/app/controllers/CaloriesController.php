<?php

class CaloriesController extends BaseController {

	/**
	 * Calory Repository
	 *
	 * @var Calory
	 */
	protected $calorie;

	public function __construct(Calory $calorie)
	{
		$this->calorie = $calorie;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$calories = $this->calorie->all();

		return View::make('calories.index', compact('calories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('calories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Calory::$rules);

		if ($validation->passes())
		{
			$this->calorie->create($input);

			return Redirect::route('calories.index');
		}

		return Redirect::route('calories.create')
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
		$calorie = $this->calorie->findOrFail($id);

		return View::make('calories.show', compact('calorie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$calorie = $this->calorie->find($id);

		if (is_null($calorie))
		{
			return Redirect::route('calories.index');
		}

		return View::make('calories.edit', compact('calorie'));
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
		$validation = Validator::make($input, Calory::$rules);

		if ($validation->passes())
		{
			$calorie = $this->calorie->find($id);
			$calorie->update($input);

			return Redirect::route('calories.show', $id);
		}

		return Redirect::route('calories.edit', $id)
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
		$this->calorie->find($id)->delete();

		return Redirect::route('calories.index');
	}

}
