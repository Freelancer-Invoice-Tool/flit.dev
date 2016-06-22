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
		if(Auth::id()){
			$project = Project::where('user_id', Auth::id())
				->where('payment_received', '=', '0000-00-00')
				->paginate(15);
	    	$paginator = new MaterializePagination($project);

	    	$due_projects=Project::where('user_id', Auth::id())
	    		->where('due_date', '!=', '0000-00-00')
	    		->where('project_submitted_date', '=', '0000-00-00')
	    		->get();

	        $needs_invoice=Project::where('user_id', Auth::id())
	        	->where('project_submitted_date', '!=', '0000-00-00')
	        	->where('invoice_submitted_date', '=', '0000-00-00')
	    		->get();
	    		
	        $needs_approval=Project::where('user_id', Auth::id())
	        	->where('invoice_submitted_date', '!=', '0000-00-00')
	        	->where('invoice_approval_date', '=', '0000-00-00')
	    		->get();

	        $awaiting_payment=Project::where('user_id', Auth::id())
	        	->where('invoice_approval_date', '!=', '0000-00-00')
	        	->where('payment_received', '=', '0000-00-00')
	    		->get();

	        $project_completed=Project::where('user_id', Auth::id())
	        	->where('payment_received', '!=', '0000-00-00')
	    		->get();

			return View::make('projects.index')
				->with('projects', $project)->with('paginator', $paginator)
				->with('due_projects', $due_projects)
				->with('needs_invoice', $needs_invoice)
				->with('needs_approval', $needs_approval)
				->with('awaiting_payment', $awaiting_payment)
				->with('project_completed', $project_completed);	
		}else{
			return $this->showMissing();
		}	
	}

	public function showOverdue()
	{
		if(Auth::id()){
			$projects = Project::where('user_id', '=', Auth::id())
				->where('due_date', '<=', Carbon\Carbon::now())
				->where('project_status', '!=', 'Payment Received')
				->where('project_status', '!=', 'Project Submitted')
				->where('project_status', '!=', 'Invoice Approved')
				->where('project_status', '!=', 'Invoice Submitted')
				->paginate(15);

	    	$paginator = new MaterializePagination($projects);

			return View::make('projects.overdue')
				->with('projects', $projects)->with('paginator', $paginator);	
		}else{
			return $this->showMissing();
		}
	}

	public function showDueDates()
	{
		if(Auth::id()){
			$projects = Project::where('user_id', '=', Auth::id())
				->where('due_date', '>', Carbon\Carbon::now())
				->where(function($query)
				{
					$query->orWhere('project_status', '=', '')
						->orWhere('project_status', '=', 'Started')
						->orWhere('project_status', '=', 'In Progress');
				})
				->paginate(15);

	    	$paginator = new MaterializePagination($projects);

			return View::make('projects.duedates')
				->with('projects', $projects)->with('paginator', $paginator);	
		}else{
			return $this->showMissing();
		}
		
	}

	public function showPayDates()
	{
		if(Auth::id()){
			$projects = Project::where('user_id', '=', Auth::id())
				->where(function($query)
				{
					$query->orWhere('project_status', '=', 'Project Submitted')
						->orWhere('project_status', '=', 'Invoice Submitted')
						->orWhere('project_status', '=', 'Invoice Approved');
				})
				->paginate(15);

	    	$paginator = new MaterializePagination($projects);

			return View::make('projects.paydates')
				->with('projects', $projects)->with('paginator', $paginator);	
		}else{
			return $this->showMissing();
		}
		
	}

	public function showArchive()
	{
		if(Auth::id()){
			$projects = Project::where('user_id', '=', Auth::id())
				->where('project_submitted_date', '!=', '0000-00-00')
				->where(function($query)
				{
					$query->orWhere('project_status', '=', 'Payment Received');
				})
				->paginate(15);

			$paginator = new MaterializePagination($projects);

			return View::make('projects.archive')
				->with('projects', $projects)
				->with('paginator', $paginator);	
		}else{
			return $this->showMissing();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			$clients = Client::where('user_id', '=', Auth::id())->get();
			
			return View::make('projects.create')->with('clients', $clients);
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

		if($project->client->user_id != Auth::id()){
			return $this->showMissing();
		}else{
			return View::make('projects.show')->with('project', $project);
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
		if (Auth::id()) {
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
		if (Auth::id()) {
			$project = Project::find($id);
			$project->delete();

			Session::flash('successMessage', 'Project has been deleted');
			return Redirect::action('ProjectsController@index', $project->id)->withInput();
		} else {
			return $this->showMissing();
		}
	}
}
