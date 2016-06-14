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
                    {{Form::text('client_name', $project->client->client_name, array('id'=>'client_name'))}}
                    {{ Form::label('client_name', 'Client Name') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('due_date', null, array('id'=>'due_date')) }}
                    {{ Form::label('due_date', 'Due Date') }}
                </div>
            
                <div class="input-field col s6">
                    {{ Form::text('project_submitted_date', null, array('id'=>'project_submitted_date')) }}
                    {{ Form::label('project_submitted_date', 'Project Submitted') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('invoice_submitted_date', null, array('id'=>'invoice_submitted_date')) }}
                    {{ Form::label('invoice_submitted_date', 'Invoice Submitted') }}
                </div>
            
                <div class="input-field col s6">
                    {{ Form::text('invoice_approval_date', null, array('id'=>'invoice_approval_date')) }}
                    {{ Form::label('invoice_approval_date', 'Invoice Approved') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('pay_date', null, array('id'=>'pay_date')) }}
                    {{ Form::label('pay_date', 'Exp Pay Date') }}
                </div>
            
                <div class="input-field col s6">
                    {{ Form::text('payment_received', null, array('id'=>'payment_received')) }}
                    {{ Form::label('payment_received', 'Payment Received') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('project_poc_name', null, array('id'=>'project_poc_name')) }}
                    {{ Form::label('project_poc_name', 'Point of Contact Name') }}
                </div>
           
                <div class="input-field col s6">
                    {{ Form::text('project_poc_phone', null, array('id'=>'project_poc_phone')) }}
                    {{ Form::label('project_poc_phone', 'Point of Contact Phone') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_email', null, array('id'=>'project_poc_email')) }}
                    {{ Form::label('project_poc_email', 'Point of Contact Email') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_address', null, array('id'=>'project_poc_address')) }}
                    {{ Form::label('project_poc_address', 'Point of Contact Address') }}
                </div>
            </div>

            <div class="row center-align">
                <div class="col s6">
                    <a href="{{{action('ProjectsController@update', $project->id)}}}" class="waves-effect waves-light btn">Submit</a>
                </div>

                <div class="col s6">
                    <a href="{{{action('ProjectsController@show', $project->id)}}}" class="waves-effect waves-light btn">Cancel</a>
                </div>
            </div>  
        </div>
        {{ Form::close() }}    
    </div>
</main>
@stop
