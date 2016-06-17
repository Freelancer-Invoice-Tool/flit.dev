@extends('layouts.master')

@section('title')
    Flit: Edit Project
@stop

@section('content')
<main>
    <div class="container"> 
        <div class="row">
            <div>
                <h2>Edit Project</h2>
            </div>
        </div>

        
        <div class="row">
            {{ Form::model($project, array('action'=>array('ProjectsController@update', $project->id), 'method'=>'PUT', 'class' => 'col s8 box', 'enctype' => 'multipart/form-data')) }}
                
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('name', null, array('id'=>'name')) }}
                    {{ Form::label('name', 'Project Name') }}
                </div>
            </div>
        
            <div class="row">
                <div class="input-field col s6">
                    {{Form::text('client_name', $project->client->client_name, array('id'=>'client_name'))}}
                    {{ Form::label('client_name', 'Client Name') }}
                </div>
                
                <div class="input-field col s6">
                    <select id="project_status" name="project_status">
                        <option value="started" selected>Started</option>
                        <option value="in_progress">In Progress</option>
                        <option value="project_submitted">Project Submitted</option>
                        <option value="invoice_submitted">Invoice Submitted</option>
                        <option value="invoice_approved">Invoice Approved</option>
                        <option value="payment_received">Payment Received</option>
                    </select>
                    <label>Project Status</label>
                </div>
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
            <div class="row">
                <div class="input-field col s12">
                    {{Form::textarea('project_notes', null, array('id'=>'project_notes', 'class'=> 'form-control other-class another materialize-textarea', 'value' => $project->project_notes))}}
                    {{ Form::label('project_notes', 'Project Notes') }}
                </div>
            </div>

            <div class="row center-align">
                <div class="col s6">
                    <button class="btn waves-effect waves-light edit-btn">Submit</button>
                </div>

                <div class="col s6">
                    <a href="{{{action('ProjectsController@show', $project->id)}}}" class="waves-effect waves-light btn">Cancel</a>
                </div>
            </div>  
            {{ Form::close() }}    
        </div>
    </div>
</main>
@stop

@section('bottom-script')
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });    
    </script>
@stop    
