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

Route::get('/home', 'HomeController@showHome');

Route::get('/signup', 'HomeController@showSignup');

Route::get('/dashboard', 'HomeController@showDashboard');

// All Project Pages
Route::resource('/projects', 'ProjectsController');

// All Client Pages
Route::resource('/clients', 'ClientsController');

// All User Actions
Route::resource('/user', 'UserController');