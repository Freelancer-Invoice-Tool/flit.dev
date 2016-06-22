<?php

class UserController extends \BaseController {

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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check()) {
            return View::make('users.create');
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
        $user = User::validateAndCreate(Request::instance());
        $email=Input::get('email');
        $password=Input::get('password');
        
        Auth::attempt(array('email' => $email, 'password' => $password));
        Session::flash('successMessage', 'Congratulations, you\'ve created your account! Welcome to your new dashboard!');

        sendMail();

        return Redirect::action('HomeController@showDashboard', $user->id)->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::user()->id==$id) {
            $user = User::find($id);
            return View::make('users.edit')->with('user', $user);
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
        $user = User::validateAndUpdate(User::find(Auth::id()), Request::instance());

        Session::flash('successMessage', 'Your changes have been saved!');
        return Redirect::action('HomeController@showDashboard', $user->id)->withInput();
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
            $user  = User::find($id);
            $user->delete();

            Session::flash('successMessage', 'User has been deleted');
            return Redirect::action('HomeController@showHome', $project->id)->withInput();
        } else {
            return $this->showMissing();
        }
    }

    // takes input from login; checks login; sends to dashboard
    public function auth()
    {   
        $email=Input::get('email');
        $password=Input::get('password');
        
        if (Auth::attempt(array('email' => $email, 'password' => $password))) {
            return Redirect::action('HomeController@showDashboard');
        } else {
            Session::flash('errorMessage', 'Email or password did not match a FLIT user. Please try again or sign up for an account!');
            return Redirect::back()->withInput();
        }
    }

    // logout function; sends to home page
    public function logout()
    {   
        if (Auth::check()) {
            Session::flash('successMessage', 'You have successfully logged out!');
        }
        Auth::logout();
        return Redirect::action('HomeController@showHome');
    }

    public function show()
    {
        
    }

}
