<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->beforeFilter(function() {
			// Auth Check
		});
	}

	public function showMissing()
	{
		return View::make('errors.missing');
	}

	public function index()
	{
		$client = Client::paginate(3);
    	$paginator = new MaterializePagination($client);

		return View::make('clients.index')->with('clients', $client)->with('paginator', $paginator);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			return View::make('clients.create');
		} else {
			return $this->showMissing();
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$client = Client::validateAndCreate(Request::instance(), User::first());

		return Redirect::action('ClientsController@show', $client->id)->withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = Client::find($id);
		return View::make('clients.show')->with('client', $client);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::check()) {
			$client = Client::find($id);
			return View::make('clients.edit')->with('client', $client);
		} else {
			return $this->showMissing();
		}	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = Client::find($id);

		$client = Client::validateAndUpdate($client, Request::instance(), User::first());

		return Redirect::action('ClientsController@show', $client->id)->withInput();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::check()) {
			$client = Client::find($id);
			$client->delete();

			Session::flash('successMessage', 'Client has been deleted');
			return Redirect::action('ClientsController@index', $client->id)->withInput();
		} else {
			return $this->showMissing();
		}
	}


}
