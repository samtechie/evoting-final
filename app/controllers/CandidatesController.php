<?php

class CandidatesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$candidates = Candidate::all();
		return View::make('candidates.index', ['candidates'=>$candidates]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('candidates.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
			'name' => 'required' ,
			'manifesto' => 'required');
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()) {
			return Redirect::to('candidates/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$candidate = new Candidate;
			$candidate->name = Input::get('name');
			$candidate->manifesto = Input::get('manifesto');
			$candidate->avatar = Input::file('avatar');  

			$candidate->save();

			// redirect
			Session::flash('message', 'Successfully Added Candidate!');
			return Redirect::to('candidates');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$candidate = Candidate::find($id);
		return View::make('candidates.show', ['candidate'=>$candidate]);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$candidate = Candidate::find($id);
		return View::make('candidates.edit', ['candidate'=>$candidate]);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
			'name' => 'required' ,
			'manifesto' => 'required');
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()) {
			return Redirect::to('candidates/'. $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$candidate = Candidate::find($id);
			$candidate->name = Input::get('name');
			$candidate->manifesto = Input::get('manifesto');
			$candidate->save();

			// redirect
			Session::flash('message', 'Successfully updated Candidate!');
			return Redirect::to('candidates');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$candidate = Candidate::find($id);
		$candidate->delete();

		Session::flash('message', 'Successfully deleted Candidate!');
		return Redirect::to('candidates');

	}


}
