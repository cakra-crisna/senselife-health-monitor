<?php

class StepsController extends BaseController {

	/**
	 * Step Repository
	 *
	 * @var Step
	 */
	protected $step;

	public function __construct(Step $step)
	{
		$this->step = $step;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$steps = $this->step->all();

		return View::make('steps.index', compact('steps'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('steps.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Step::$rules);

		if ($validation->passes())
		{
			$this->step->create($input);

			return Redirect::route('steps.index');
		}

		return Redirect::route('steps.create')
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
		$step = $this->step->findOrFail($id);

		return View::make('steps.show', compact('step'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$step = $this->step->find($id);

		if (is_null($step))
		{
			return Redirect::route('steps.index');
		}

		return View::make('steps.edit', compact('step'));
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
		$validation = Validator::make($input, Step::$rules);

		if ($validation->passes())
		{
			$step = $this->step->find($id);
			$step->update($input);

			return Redirect::route('steps.show', $id);
		}

		return Redirect::route('steps.edit', $id)
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
		$this->step->find($id)->delete();

		return Redirect::route('steps.index');
	}

}
