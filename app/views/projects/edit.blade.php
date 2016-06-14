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
                    {{ Form::label('name', 'name') }}
                </div>
            </div>
        
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('client_name', null, array('id'=>'client_name')) }}
                    {{ Form::label('client_name', 'client_name') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('due_date', null, array('id'=>'due_date')) }}
                    {{ Form::label('due_date', 'due_date') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_submitted_date', null, array('id'=>'project_submitted_date')) }}
                    {{ Form::label('project_submitted_date', 'project_submitted_date') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('invoice_submitted_date', null, array('id'=>'invoice_submitted_date')) }}
                    {{ Form::label('invoice_submitted_date', 'invoice_submitted_date') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('invoice_approval_date', null, array('id'=>'invoice_approval_date')) }}
                    {{ Form::label('invoice_approval_date', 'invoice_approval_date') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('pay_date', null, array('id'=>'pay_date')) }}
                    {{ Form::label('pay_date', 'pay_date') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('payment_received', null, array('id'=>'payment_received')) }}
                    {{ Form::label('payment_received', 'payment_received') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_name', null, array('id'=>'project_poc_name')) }}
                    {{ Form::label('project_poc_name', 'project_poc_name') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_phone', null, array('id'=>'project_poc_phone')) }}
                    {{ Form::label('project_poc_phone', 'project_poc_phone') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_email', null, array('id'=>'project_poc_email')) }}
                    {{ Form::label('project_poc_email', 'project_poc_email') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('project_poc_address', null, array('id'=>'project_poc_address')) }}
                    {{ Form::label('project_poc_address', 'project_poc_address') }}
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
