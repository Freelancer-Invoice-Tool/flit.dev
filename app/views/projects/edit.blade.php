@extends('layouts.master')

@section('title')
    FLIT: Edit Project
@stop

@section('content')
<main>
    <div class="container"> 
        <div class="row">
            <div>
                <h2 class="hide-on-med-and-down">Edit Project</h2>
                <h3 class="hide-on-large-only">Edit Project</h3>
            </div>
        </div>

        <div>
            {{ Form::model($project, array('action'=>array('ProjectsController@update', $project->id), 'method'=>'PUT', 'class' => 'col s8 box', 'enctype' => 'multipart/form-data')) }}
                
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('name', $project->name, array('id'=>'name')) }}
                    {{ Form::label('name', 'Project Name') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    {{Form::textarea('description', Input::old('description'), array('id'=>'description', 'class'=> 'form-control other-class another materialize-textarea', 'value' => $project->description))}}
                    {{ Form::label('description', 'Description') }}
                </div>
            </div>
        
            <div class="row">
                <div class="input-field col s6">
                    {{Form::text('client_name', $project->client->client_name, array('id'=>'client_name'))}}
                    {{ Form::label('client_name', 'Client Name') }}
                </div>
                
                <div class="input-field col s6">
                    <select id="project_status" name="project_status">
                        <option label="Started" selected>Started</option>
                        <option label="In Progress">In Progress</option>
                        <option label="Project Submitted">Project Submitted</option>
                        <option label="Invoice Submitted">Invoice Submitted</option>
                        <option label="Invoice Approved">Invoice Approved</option>
                        <option label="Payment Received">Payment Received</option>
                    </select>
                    <label>Project Status</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="date" class="datepicker" id="due_date" name="due_date" value="{{{$project->due_date}}}">
                    
                    {{ Form::label('due_date', 'Due Date') }}
                </div>
            
                <div class="input-field col s6">
                    @if ((strpos($project->project_submitted_date, '-0001'))===false) 
                        <input type="date" class="datepicker" id="project_submitted_date" name="project_submitted_date" value="{{{$project->project_submitted_date}}}">
                    @else
                        <input type="date" class="datepicker" id="project_submitted_date" name="project_submitted_date" value="">
                    @endif 
                    {{ Form::label('project_submitted_date', 'Project Submittal') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <!-- if/else in fields below prevent form from displaying weird '-0001' date if there's no date in mySQL -->
                    @if ((strpos($project->invoice_submitted_date, '-0001'))===false) 
                        <input type="date" class="datepicker" id="invoice_submitted_date" name="invoice_submitted_date" value="{{{$project->invoice_submitted_date}}}">
                    @else
                        <input type="date" class="datepicker" id="invoice_submitted_date" name="invoice_submitted_date" value="">
                    @endif 
                    {{ Form::label('invoice_submitted_date', 'Invoice Submittal') }}
                </div>
            
                <div class="input-field col s6">
                    @if ((strpos($project->invoice_approval_date, '-0001'))===false) 
                        <input type="date" class="datepicker" id="invoice_approval_date" name="invoice_approval_date" value="{{{$project->invoice_approval_date}}}">
                    @else
                        <input type="date" class="datepicker" id="invoice_approval_date" name="invoice_approval_date" value="">
                    @endif 
                    {{ Form::label('invoice_approval_date', 'Invoice Approval') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    @if ((strpos($project->pay_date, '-0001'))===false) 
                        <input type="date" class="datepicker" id="pay_date" name="pay_date" value="{{{$project->pay_date}}}">
                    @else
                        <input type="date" class="datepicker" id="pay_date" name="pay_date" value="">
                    @endif 
                    {{ Form::label('pay_date', 'Payment Date') }}
                </div>
            
                <div class="input-field col s6">
                    @if ((strpos($project->payment_received, '-0001'))===false) 
                        <input type="date" class="datepicker" id="payment_received" name="payment_received" value="{{{$project->payment_received}}}">
                    @else
                        <input type="date" class="datepicker" id="payment_received" name="payment_received" value="">
                    @endif 
                    {{ Form::label('payment_received', 'Payment Received') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    {{Form::text('budgeted_amount', null, array('id'=>'budgeted_amount'))}}
                    {{Form::label('budgeted_amount', 'Budgeted Amount')}}    
                </div>
                <div class="input-field col s6">
                    {{Form::text('actual_amount', null, array('id'=>'actual_amount'))}}
                    {{Form::label('actual_amount', 'Actual Amount')}}  
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('project_poc_name', null, array('id'=>'project_poc_name')) }}
                    {{ Form::label('project_poc_name', 'Contact Name') }}
                </div>
           
                <div class="input-field col s6">
                    {{ Form::text('project_poc_phone', null, array('id'=>'project_poc_phone')) }}
                    {{ Form::label('project_poc_phone', 'Contact Phone') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    {{ Form::text('project_poc_email', null, array('id'=>'project_poc_email')) }}
                    {{ Form::label('project_poc_email', 'Contact Email') }}
                </div>
            
                <div class="input-field col s6">
                    {{ Form::text('project_poc_address', null, array('id'=>'project_poc_address')) }}
                    {{ Form::label('project_poc_address', 'Contact Address') }}
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
                    <a href="{{{action('ProjectsController@show', $project->id)}}}" class="waves-effect waves-light btn delete-btn">Cancel</a>
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

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
              });
        });    
    </script>
@stop    
