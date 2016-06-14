@extends('layouts.master')

@section('title')
    Flit Home Login
@stop

@section('content')
<main>
    <div class="container"> 
        <div class="row">
            <div class="col s6">
                <h1>Flit</h1>
                <p>Your Personal Assistant</p>
            </div>
        </div>

        <div class="row">
            <div class="col s6 col offset-s3">
                <form>
                {{ Form::open(array('action'=>'UserController@auth', 'class'=>'col s12','enctype'=>'multipart/form-data')) }}

                    <div class="row">
                        <div class="col s6 left-align">
                            <h2>Log In</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="email" id="email" type="text" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <button type="submit" class="btn waves-effect waves-light">Log In</button>
                        </div>
                        
                        <div class="col s6">
                            <p>Don't have an account?</p>
                            <a href="{{{action('HomeController@showSignup')}}}">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop
