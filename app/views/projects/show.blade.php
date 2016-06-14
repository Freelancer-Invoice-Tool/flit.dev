@extends('layouts.master')

@section('title')
    Flit: Project Details
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>Project Details</h1>
        </div>

        <div class="row">
            <div class="col s3">
                <h3>Project: {{{$project->name}}}</h3>
                <p>Client: {{{$project->client->client_name}}}</p>
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
    </div> <!-- closes container -->
       
</main>
@stop
