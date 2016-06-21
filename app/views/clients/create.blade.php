@extends('layouts.master')

@section('title')
    Flit: Create Client
@stop

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col s10">
                <h1>Create a New Client</h1>
            </div> 
        </div> 

        <div class="row">
            <div class="col s10">
                <div id="errors">
                    <h3>{{ $errors->first('client_name', '<span class="help-block">:message</span>') }}</h3> 
                </div> 
            </div>
        </div>

        {{Form::open(array('action' => 'ClientsController@store'))}} 
            <div class="row">
                <div class="col s10">
                    {{Form::label('client_name', 'Client Name')}} 
                    {{Form::text('client_name', Input::old('title'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. ABC Company, Inc.'))}}
                </div> 
            </div>

            <div class="row">
                <div class="col s10">
                    {{Form::label('payment_terms', 'Payment Terms (in number of days)')}} 
                    {{Form::number('payment_terms', Input::old('payment_terms'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 30'))}} 
                </div>
            </div>


            <div class="row">
                <div class="col s10">
                    {{Form::label('submission_or_approval', 'Does Payment Term start on invoice approval or invoice submission?')}} 
                    {{Form::text('submission_or_approval', Input::old('submission_or_approval'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. submission'))}} 
                </div>
            </div>

            <div class="row">
                <div class="col s10">
                    {{Form::label('main_poc_name', 'Main Point of Contact Name')}}
                    {{Form::text('main_poc_name', Input::old('main_poc_name'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. Joe Blow'))}}
                </div>
            </div>

            <div class="row">
                <div class="col s10">
                    {{Form::label('main_poc_email', 'Main Point of Contact Email')}}
                    {{Form::text('main_poc_email', Input::old('main_poc_email'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. jblow@example.com'))}}
                </div>
            </div>

            <div class="row">
                <div class="col s10">
                    {{Form::label('main_poc_phone', 'Main Point of Contact Phone')}}
                    {{Form::text('main_poc_phone', Input::old('main_poc_phone'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 210-867-5309'))}}
                </div>
            </div>

            <div class="row">
                <div class="col s10">
                    {{Form::label('main_poc_address', 'Main Point of Contact Address')}}
                    {{Form::text('main_poc_address', Input::old('main_poc_address'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 123 Some Street Anytown, TX 78253'))}}
                </div>
            </div>

            <div class="row">
                <div class="col s10">
                    <button type="submit" class="btn edit-btn btn-margin">Create Client</button>     
                </div>
            </div>
        {{Form::close()}}
    </div>
</main>
@stop