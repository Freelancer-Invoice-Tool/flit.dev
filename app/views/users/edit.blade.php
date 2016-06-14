@extends('layouts.master')

@section('title')
    Flit Home Edit
@stop

@section('content')

<main>

    <div class="container">
        <!-- model form automatically fills in user info as placeholders -->
        {{ Form::model($user, array('action' => array('UserController@update', $user->id), 'method' => 'PUT'))}}
            <div class="row">
                <div class="col s8">
                    <h1>Edit Your Account</h1>
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
                                <!-- <input id="password" type="password" class="validate"> -->
                                {{ Form::label('password', 'Password') }}
                                <!-- <label for="password">Password</label> -->
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn">Save New Info?</button>     
                        </div>
                    </form>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</main>
@stop

