@extends('layouts.master')

@section('title')
    FLIT Home Login
@stop

@section('content')
<main>
    <div class="container"> 
        <div class="row">
            <div class="col s6">
                <h2 class="hide-on-med-and-down">FLIT</h2>
                <h3 class="hide-on-large-only">FLIT</h3>
                <h5 class="hide-on-med-and-down">Your Personal Assistant</h5>
                <h6 class="hide-on-large-only">Your Personal Assistant</h6>
            </div>
        </div>

        <div class="row">
            <div class="col s6 col offset-s3">
                {{ Form::open(array('method' => 'POST', 'action'=>'UserController@auth', 'class'=>'col s12','enctype'=>'multipart/form-data')) }}

                    <div class="row">
                        <div class="col s6 left-align">
                            <h3 class="hide-on-med-and-down">Log In</h3>
                            <h4 class="hide-on-large-only">Log In</h4>
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

                    <!-- expanded index visible on horizontal tablet and larger -->
                    <div class="row hide-on-med-and-down">
                        <div class="col s6 hide-on-med-and-down">
                            <button type="submit" class="btn waves-effect waves-light edit-btn">Log In</button>
                        </div>
                        
                        <div class="col s6 hide-on-med-and-down">
                            <p>Don't have an account?</p>
                            <a href="{{{action('HomeController@showSignup')}}}">Sign Up</a>
                        </div>
                    </div>

                    <!-- condensed index visible on vertical tablet and smaller -->
                    <div class="row hide-on-large-only">
                        <div class="col s6 hide-on-large-only">
                            <button type="submit" class="btn waves-effect waves-light edit-btn no-wrap">Log In</button>
                        </div>

                        <div class="mobile-login row hide-on-large-only">
                            <div class="col s12">
                                <p>Don't have an account?</p>
                            </div>
                        </div>

                        <div class="row hide-on-large-only">
                            <div class="col s6">
                                <a href="{{{action('HomeController@showSignup')}}}">Sign Up</a>
                            </div>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</main>
@stop
