@extends('layouts.master')

@section('title')
    Flit: Add New Project
@stop

@section('content')
<main>
    <div class="container"> 
        <div class="row">
            <div>
                <h2>Add New Project</h2>
            </div>
        </div>

        <div>
            {{ Form::open(array('action'=>'ProjectsController@store', 'class' => 'col s8 box', 'enctype' => 'multipart/form-data')) }}
                
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('name', null, array('id'=>'name')) }}
                    {{ Form::label('name', 'Project Name') }}
                </div>
                <div class="input-field col s12">
                    <input type="date" class="datepicker" id="due_date" name="due_date">
                    {{ Form::label('due_date', 'Due Date') }}
                </div>
            </div>
        
            <div class="row">
                <div class="input-field col s12">
                    <select id="client_dropdown" name="client_dropdown">
                        <option label='select' selected>Select from dropdown</option>
                        <option data-clientid='create' label='create_new'>Create new</option>
                        @foreach($clients as $client)
                            <option data-clientid="{{{ $client->id }}}" label="{{{ $client->client_name }}}">{{{ $client->client_name }}}</option>
                        @endforeach
                    </select>
                    <label>Select client</label>
                </div>
            </div>

            <!-- create client fields should remain hidden unless user selects to create new -->
            <div id="create_client" class='hide'>
                <div class='row col s12'>
                    {{Form::label('client_name', 'Client Name')}} 
                    {{Form::text('client_name', Input::old('title'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. ABC Company, Inc.'))}} 
                </div>
                <div class='row'>
                    <div class='col s12'>
                        {{Form::label('payment_terms', 'Payment Terms (in number of days)')}} 
                        {{Form::number('payment_terms', Input::old('payment_terms'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 30'))}} 
                    </div>
                    <div class='col s12'>
                        {{Form::label('submission_or_approval', 'Does Payment Term start on invoice approval or invoice submission?')}} 
                        {{Form::text('submission_or_approval', Input::old('submission_or_approval'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. submission'))}} 
                    </div>
                </div>
                <div class='row col s12'>
                    {{Form::label('main_poc_name', 'Main Point of Contact Name')}}
                    {{Form::text('main_poc_name', Input::old('main_poc_name'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. Joe Blow'))}}
                </div>
                <div class='row col s12'>
                    {{Form::label('main_poc_email', 'Main Point of Contact Email')}}
                    {{Form::text('main_poc_email', Input::old('main_poc_email'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. jblow@example.com'))}}
                </div>
                <div class='row col s12'>
                    {{Form::label('main_poc_phone', 'Main Point of Contact Phone')}}
                    {{Form::text('main_poc_phone', Input::old('main_poc_phone'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 210-867-5309'))}}
                </div>
                <div class='row col s12'>
                    {{Form::label('main_poc_address', 'Main Point of Contact Address')}}
                    {{Form::text('main_poc_address', Input::old('main_poc_address'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 123 Some Street Anytown, TX 78253'))}}
                </div>

            </div>
            <!-- end of client creation fields -->

                <div class="input-field col s12">
                    {{Form::hidden('project_status', 'started', array('id'=>'project_status'))}}   
                </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="date" class="datepicker" id="project_submitted_date" name="project_submitted_date">
                    {{ Form::label('project_submitted_date', 'Date Project Submitted') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="date" class="datepicker" id="invoice_submitted_date" name="invoice_submitted_date">
                    {{ Form::label('invoice_submitted_date', 'Date Invoice Submitted') }}
                </div>
            
                <div class="input-field col s6">
                    <input type="date" class="datepicker" id="invoice_approval_date" name="invoice_approval_date">
                    {{ Form::label('invoice_approval_date', 'Date Invoice Approved') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="date" class="datepicker" id="pay_date" name="pay_date">
                    {{ Form::label('pay_date', 'Exp Pay Date') }}
                </div>
            
                <div class="input-field col s6">
                    <input type="date" class="datepicker" id="payment_received" name="payment_received">
                    {{ Form::label('payment_received', 'Date Payment Received') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::label('project_poc_name', 'Project Contact\'s Name') }}
                    {{ Form::text('project_poc_name', null, array('id'=>'project_poc_name')) }}
                </div>
           
                <div class="input-field col s6">
                    {{ Form::label('project_poc_phone', 'Project Contact\'s Phone') }}
                    {{ Form::text('project_poc_phone', null, array('id'=>'project_poc_phone')) }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::label('project_poc_email', 'Project Contact\'s Email') }}
                    {{ Form::text('project_poc_email', null, array('id'=>'project_poc_email')) }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::label('project_poc_address', 'Project Contact\'s Address') }}
                    {{ Form::text('project_poc_address', null, array('id'=>'project_poc_address')) }}
                </div>
            </div>
 
            <div class="row center-align">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light edit-btn">Add New Project</button>
                </div>
            </div> 
        </div>
        {{ Form::close() }}    
    </div>
</main>
@stop

@section('bottom-script')
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

        $(client_dropdown).change(function(){
            if ($(this).find(':selected').data('clientid')=='create') {
                $("#create_client").removeClass("hide");
                $('#client_name').val("");
                $('#payment_terms').val("");
                $('#submission_or_approval').val("");
                $('#main_poc_name').val("");
                $('#main_poc_email').val("");
                $('#main_poc_phone').val("");
                $('#main_poc_address').val("");
            } else if ($(this).find(':selected').data('clientid') > 0) {
                $("#create_client").addClass("hide");
                var clientid = ($(this).find(':selected').data('clientid'));
                $.ajax({
                    url: '/clients/ajax/' + clientid,
                    type: 'get',
                    success: function(response){
                        console.log(response);
                        $('#client_name').val(response.client_name);
                        $('#payment_terms').val(response.payment_terms);
                        $('#submission_or_approval').val(response.submission_or_approval);
                        $('#main_poc_name').val(response.main_poc_name);
                        $('#project_poc_name').val(response.main_poc_name);
                        $('#main_poc_email').val(response.main_poc_email);
                        $('#project_poc_email').val(response.main_poc_email);
                        $('#main_poc_phone').val(response.main_poc_phone);
                        $('#project_poc_phone').val(response.main_poc_phone);
                        $('#main_poc_address').val(response.main_poc_address);
                        $('#project_poc_address').val(response.main_poc_address);
                    },
                    fail: function(response){
                        console.log ("it failed");
                    }
                });

            } else {
                $("#create_client").addClass("hide");
                $('#client_name').val("");
                $('#payment_terms').val("");
                $('#submission_or_approval').val("");
                $('#main_poc_name').val("");
                $('#main_poc_email').val("");
                $('#main_poc_phone').val("");
                $('#main_poc_address').val("");
            }

        });



            
    </script>
@stop    
