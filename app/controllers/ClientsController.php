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
		$client = Client::where('user_id', '=', Auth::id())->paginate(9);
		
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
		if (Auth::id()) {
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
		$name=Input::get('client_name');
		// dd($name);
		$isNotDuplicate = Client::where('user_id', '=', Auth::id())
			->where('client_name', '=', $name)->first();
		if(empty($isNotDuplicate)) {
			$client = Client::validateAndCreate(Request::instance(), User::find(Auth::id()));

			return Redirect::action('ClientsController@show', $client->id)->withInput();
		} else {
			Session::flash('errorMessage', "There's already a client with that name! Please modify the client name.");
			return Redirect::back()->withInput();
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
		$client = Client::find($id);
		$projects = Project::where('user_id', '=', Auth::id())
			->where('client_id', '=', $client->id)
			->where('due_date', '>', Carbon\Carbon::now())
			->where('project_status', '!=', 'Payment Received')
			->orderBy('due_date', 'desc')
			->get();

		if($client->user_id != Auth::id()){
			return $this->showMissing();
		}else{
			return View::make('clients.show')->with('client', $client)->with('projects', $projects);	
		}
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

		$client = Client::validateAndUpdate($client, Request::instance(), User::find(Auth::id()));

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
		if (Auth::id()) {
			$client = Client::find($id);
			$projects = DB::table('projects')->where('client_id', $client->id);
			$projects->delete();
			$client->delete();

			Session::flash('successMessage', 'Client has been deleted');
			return Redirect::action('ClientsController@index', $client->id)->withInput();
		} else {
			return $this->showMissing();
		}
	}

	public function getClient($id) {
		$client=Client::find($id);
		return Response::json($client);
	}


}
