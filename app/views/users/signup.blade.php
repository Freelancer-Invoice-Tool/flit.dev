@extends('layouts.master')

@section('title')
    FLIT Home Login
@stop

@section('content')

<main>

    <div class="container">
        <div class="row">
            <div class="col s6">
                <h1>Signup</h1>
            </div>
        </div>

        <div>
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

            <div class="row">
                <div class="col s6 left-align">
                    <button type="submit" class="btn edit-btn btn-margin no-wrap">Create Account</button>
                </div>     
            </div>
                    
        {{ Form::close() }}
        </div>
    </div>
</main>
@stop

