@extends('layouts.master')

@section('title')
    Flit Home Login
@stop

@section('content')
<main>
    <div class="container"> 
        <div class="row">
            <div class="col s12">
                <h2>Log In</h2>
            </div>
        </div>

        <div class="row">
            <div class="col s8">
                <form class="col s12" method="POST" enctype="multipart/form-data" action="{#">
                    {{Form::token()}}

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="username" id="username" type="text" class="validate">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light">Log In</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6"
                            <p>Don't have an account?</p>
                        </div>
                        <div class="col s6">
                            <a href="{{{action('HomeController@showSignup')}}}">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop
