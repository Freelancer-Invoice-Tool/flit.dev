@extends('layouts.master')

@section('title')
    Flit: Create Client
@stop

@section('content')

    <div class="container row">
        <h1>Create a New Client</h1>  

        <div id="errors">
            <h3>{{ $errors->first('client_name', '<span class="help-block">:message</span>') }}</h3 
        </div> 

        {{Form::open(array('action' => 'ClientsController@store'))}} 
            <div>
                {{Form::label('client_name', 'Client Name')}} 
                {{Form::text('title', Input::old('title'), array('class' => 'form-control other-class another', 'placeholder' => 'Client Name'))}} 
            </div>

        {{Form::close()}}
    </div>
@stop