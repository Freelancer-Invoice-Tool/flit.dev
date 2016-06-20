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

        <div class="row">
            {{ Form::open(array('action'=>'ProjectsController@store', 'class' => 'col s8 box', 'enctype' => 'multipart/form-data')) }}
                
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('name', null, array('id'=>'name')) }}
                    {{ Form::label('name', 'Project Name') }}
                </div>
            </div>
        
            <div class="row">
                <div class="input-field col s12">
                    <select id="client_dropdown" name="client_dropdown">
                        <option label='select' selected>Select from dropdown</option>
                        <option label='create_new'>Create new</option>
                        @foreach($clients as $client)
                            <option data-clientid="{{{ $client->id }}}" label="{{{ $client->client_name }}}">{{{ $client->client_name }}}</option>
                        @endforeach
                    </select>
                    <label>Select client</label>
                </div>
            </div>

            <!-- create client fields should remain hidden unless user selects to create new -->
            <div id="create_client"> <!-- class='hide'> -->
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
                    {{ Form::text('due_date', null, array('id'=>'due_date')) }}
                    {{ Form::label('due_date', 'Due Date') }}
                </div>

            
                <div class="input-field col s6">
                    {{ Form::text('project_submitted_date', null, array('id'=>'project_submitted_date')) }}
                    {{ Form::label('project_submitted_date', 'Date Project Submitted') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('invoice_submitted_date', null, array('id'=>'invoice_submitted_date')) }}
                    {{ Form::label('invoice_submitted_date', 'Date Invoice Submitted') }}
                </div>
            
                <div class="input-field col s6">
                    {{ Form::text('invoice_approval_date', null, array('id'=>'invoice_approval_date')) }}
                    {{ Form::label('invoice_approval_date', 'Date Invoice Approved') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('pay_date', null, array('id'=>'pay_date')) }}
                    {{ Form::label('pay_date', 'Exp Pay Date') }}
                </div>
            
                <div class="input-field col s6">
                    {{ Form::text('payment_received', null, array('id'=>'payment_received')) }}
                    {{ Form::label('payment_received', 'Date Payment Received') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('project_poc_name', null, array('id'=>'project_poc_name')) }}
                    {{ Form::label('project_poc_name', 'Project Contact\'s Name') }}
                </div>
           
                <div class="input-field col s6">
                    {{ Form::text('project_poc_phone', null, array('id'=>'project_poc_phone')) }}
                    {{ Form::label('project_poc_phone', 'Project Contact\'s Phone') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_email', null, array('id'=>'project_poc_email')) }}
                    {{ Form::label('project_poc_email', 'Project Contact\'s Email') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_address', null, array('id'=>'project_poc_address')) }}
                    {{ Form::label('project_poc_address', 'Project Contact\'s Address') }}
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

        $(client_dropdown).change(function(){
            // ajax call found on http://stackoverflow.com/questions/30825656/on-dropdown-selection-how-to-fill-complete-form-fields-from-database
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
                    $('#main_poc_email').val(response.main_poc_email);
                    $('#main_poc_phone').val(response.main_poc_phone);
                    $('#main_poc_address').val(response.main_poc_address);
                    
                    
                    
                },
                fail: function(response){
                    console.log ("it failed");
                }
            });
        });



            
    </script>
@stop    
