@extends('layouts.master')

@section('title')
    Flit: My Projects
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>All Projects</h1>
        </div>

    <!--foreach loop here to propagate data, will also need paginate/row thing prob  -->
        @foreach($projects as $project)
            <div class="row">
                <div class="col s3">
                    <h3><a href="{{{ action('ProjectsController@show', $project->id) }}}">Project: {{{$project->name}}}</a></h3>
                        <p>Client: {{{$project->client_id}}}</p>
                        <p>Due Date: {{{$project->due_date}}}</p>
                        <p>Submitted On: {{{$project->project_submitted_date}}}</p>
                        <p>Invoice Submitted On: {{{$project->invoice_submitted_date}}}</p> 
                        <p>Invoice Approved On: {{{$project->invoice_approval_date}}}</p>
                        <p>Pay Date: {{{$project->pay_date}}}</p>
                        <p>Payment Recieved On: {{{$project->payment_received}}}</p>
                        <p>Main Contact Name: {{{$project->project_poc_name}}}</p>
                        <p>Main Contact Phone: {{{$project->project_poc_phone}}}</p>
                        <p>Main Contact Email: {{{$project->project_poc_email}}}</p>
                        <p>Main Contact Address: {{{$project->project_poc_address}}}</p>
                </div> 
            </div> <!-- closes row -->
        @endforeach  
    </div> <!-- closes container -->
       
</main>
@stop
