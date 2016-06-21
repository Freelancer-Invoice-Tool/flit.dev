@extends('layouts.master')

@section('title')
    FLIT Home Edit
@stop

@section('content')

<main>
    <div class="container">
        <!-- model form automatically fills in user info as placeholders -->
        {{ Form::model($user, array('action' => array('UserController@update', $user->id), 'method' => 'PUT'))}}
            <div class="row">
                <div class="col s8">
                    <h2 class="hide-on-med-and-down">Edit Your Account</h2>
                    <h3 class="hide-on-large-only">Edit Your Account</h3>
                </div>
            </div>

            <div class="col s6">
                 <div class="row">
                    <form class="col s10">
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
                                {{ Form::email('email', null, array('class'=>'validate', 'id'=>'email')) }}
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
                            <button type="submit" class="btn edit-btn">Save New Info?</button>     
                        </div>
                    </form>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</main>
@stop

