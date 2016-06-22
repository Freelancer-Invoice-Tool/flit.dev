@extends('layouts.master')

@section('title')
    FLIT Home Login
@stop

@section('content')

<main>

    <div class="container">
        <div class="section row">
            <div class="col s6">
                <h2 class="hide-on-med-and-down">Sign Up</h2>
                <h3 class="hide-on-large-only">Sign Up</h3>
            </div>
        </div>

        <div class="section">
        {{ Form::open(array('action'=>'UserController@store')) }}
                      
            <div class="row">
                <div class="input-field col s6">
                    {{Form::text('first_name', null, array('class'=>'validate'))}}
                    {{ Form::label('first_name', 'First Name') }}
                </div>
                <div class="input-field col s6">
                    {{ Form::text('last_name', null, array('class'=>'validate')) }}
                    {{ Form::label('last_name', 'Last Name') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::email('email', null, array('class'=>'validate')) }}
                    {{ Form::label('email', 'Email') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::password('password', null, array('class'=>'validate')) }}
                    {{ Form::label('password', 'Password') }}
                </div>
            </div>

            <!-- expanded index visible on horizontal tablet and larger -->
            <div class="row hide-on-med-and-down">
                <div class="col s6 hide-on-med-and-down">
                    <button type="submit" class="btn waves-effect waves-light edit-btn no-wrap">Create Account</button>
                </div>
                
                <div class="col s6 hide-on-med-and-down">
                    <p>Already have an account?</p>
                    <a class="no-wrap" href="{{{action('HomeController@showHome')}}}">Log In</a>
                </div>
            </div>

            <!-- condensed index visible on vertical tablet and smaller -->
            <div class="row hide-on-large-only">
                <div class="col s12 hide-on-large-only center-align">
                    <button type="submit" class="btn waves-effect waves-light edit-btn no-wrap">Create Account</button>
                </div>

                <div class="mobile-login row hide-on-large-only">
                    <div class="col s12">
                        <p class="center-align">Already have an account?</p>
                    </div>
                </div>

                <div class="row hide-on-large-only">
                    <div class="col s12 center-align">
                        <a class="no-wrap" href="{{{action('HomeController@showHome')}}}">Log In</a>
                    </div>
                </div>
            </div>
                    
        {{ Form::close() }}
        </div>
    </div>
</main>
@stop

