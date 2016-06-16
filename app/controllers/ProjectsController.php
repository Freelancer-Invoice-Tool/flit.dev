<?php

class ProjectsController extends \BaseController {

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
		$project = Project::where('user_id', Auth::id())->paginate(3);
    	$paginator = new MaterializePagination($project);

		return View::make('projects.index')->with('projects', $project)->with('paginator', $paginator);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			return View::make('projects.create');
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
		$client = Client::validateAndCreate(Request::instance(), User::find(Auth::id()));

		$project = Project::validateAndCreate(Request::instance(), User::find(Auth::id()), $client);

		$clientname = Input::get('client_name');

		// $clients = DB::table('clients')->where('client_name', $clientname)->get();

		// foreach($client as $blah) {

		// 	if($project->client->id == $blah->id) {
		// 		$client = $blah;
		// 	}
		// }

		
		return Redirect::action('ProjectsController@show', $project->id)->withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::find($id);
		return View::make('projects.show')->with('project', $project);
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
			$project = Project::find($id);
			return View::make('projects.edit')->with('project', $project);
		} else {
			return $this->showMissing();
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::find($id);

		$clientname = Input::get('client_name');

		$clients = DB::table('clients')->where('client_name', $clientname)->get();

		foreach($clients as $blah) {
			if($project->client_id == $blah->id) {
				$client = $blah;
			}
		}

		$project = Project::validateAndUpdate($project, Request::instance(), User::find(Auth::id()), $client);

		return Redirect::action('ProjectsController@show', $project->id)->withInput();
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
			$project = Project::find($id);
			$project->delete();

			Session::flash('successMessage', 'Project has been deleted');
			return Redirect::action('ProjectsController@index', $project->id)->withInput();
		} else {
			return $this->showMissing();
		}
	}


}
