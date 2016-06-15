@extends('layouts.master')

@section('title')
    Flit Home Login
@stop

@section('content')

<main>

    <div class="container">
        {{ Form::open(array('action'=>'UserController@store')) }}
            <div class="row">
                <div class="col s8">
                    <h1>Signup for Flit!</h1>
                </div>
            </div>

            <div class="col s6">
                 <div class="row">
                    <form class="col s12">
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

                        <div>
                            <button type="submit" class="btn">Create Account</button>     
                        </div>
                    </form>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</main>
@stop

