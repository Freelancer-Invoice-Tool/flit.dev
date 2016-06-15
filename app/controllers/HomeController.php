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
		// $project = Project::where('due_date', '>= today <= today+30', Auth::id())->paginate(9);
		return View::make('dashboard');
	}
}
