<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');

Route::get('/signup', 'HomeController@showSignup');

Route::get('/dashboard', 'HomeController@showDashboard');

// All Project Pages
Route::resource('/projects', 'ProjectsController');

Route::get('/overdueProjects', 'ProjectsController@showOverdue');

Route::get('/dueDates', 'ProjectsController@showDueDates');

Route::get('/paydates', 'ProjectsController@showPayDates');

Route::get('/archive', 'ProjectsController@showArchive');

// All Client Pages
Route::resource('/clients', 'ClientsController');

// All User Actions
Route::resource('/user', 'UserController');

// Perform user authorization function
Route::post('/', 'UserController@auth');

// Route to logout function
Route::get('/logout', 'UserController@logout');

Route::get('clients/ajax/{id}', 'ClientsController@getClient');

Route::get('mail-test', function(){

    $user = Auth::user();

    // foreach ($users as $user) {
        // dd($user);
        $projects = Project::where('user_id', '=', $user->id)
                ->where('due_date', '>', Carbon\Carbon::now())
                ->where('due_date', '<', Carbon\Carbon::now()->addMonth())
                ->where('project_status', '!=', 'Payment Received')
                ->orderBy('due_date', 'asc')->get();

        $overdueProjects = Project::where('user_id', '=', $user->id)
                ->where('due_date', '<=', Carbon\Carbon::now())
                ->where('project_status', '!=', 'Payment Received')
                ->where('project_status', '!=', 'Project Submitted')
                ->where('project_status', '!=', 'Invoice Approved')
                ->where('project_status', '!=', 'Invoice Submitted')
                ->count();

        $view = 'emails.summary';
        $toEmail = $user->email;
        // dd($toEmail);
        $toHuman = $user->first_name;
        $subject = 'Your Weekly Summary';
        $data = [
            'user' => $user,
            'projects' => $projects,
            'overdueProjects' => $overdueProjects
        ];
        // sleep(2);
        sendMail($view, $toEmail, $toHuman, $subject, $data);
    // }
    
});