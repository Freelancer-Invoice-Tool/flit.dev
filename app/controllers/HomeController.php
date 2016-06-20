<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHome()
	{
    	return View::make('home');
	}

	public function showSignup()
	{
		return View::make('users.signup');
	}

	public function showDashboard()
	{
		//for month view
		$projects = Project::where('user_id', '=', Auth::id())
			->where('due_date', '>', Carbon\Carbon::now())
			->where('due_date', '<', Carbon\Carbon::now()->addMonth())
			->where('project_status', '!=', 'Payment Received')
			->orderBy('due_date', 'asc')->paginate(9);

		//for overdue alert on dashboard
		$overdueProjects = Project::where('user_id', '=', Auth::id())
			->where('due_date', '<=', Carbon\Carbon::now())
			->where('project_status', '!=', 'Payment Received')
			->where('project_status', '!=', 'Project Submitted')
			->where('project_status', '!=', 'Invoice Approved')
			->where('project_status', '!=', 'Invoice Submitted')
			->count();

		return View::make('dashboard')->with('projects', $projects)->with('overdueProjects', $overdueProjects);
	
	}
}
