@extends('layouts.master')

@section('title')
    FLIT: Project Archive
@stop

@section('content')
<main>
<div class="container">
    <div class="row">
        <h2 class="hide-on-med-and-down">Project Archive</h2>
        <h4 class="hide-on-large-only">Project Archive</h4>   
    </div>

    <!-- expanded index visible on horizontal tablet and larger -->
    <div class="section hide-on-med-and-down">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Project Submitted</th>
                    <th>Due Date</th>
                    <th>Hours Logged</th>
                    <th>Invoice Submitted</th>
                    <th>Invoice Approved</th>
                    <th>Payment Received</th>
                </tr>  
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></td>
                    <td>{{{$project->project_submitted_date->format('m-d-Y')}}}</td>

                    @if((strpos($project->due_date, '-0001')) === false && !empty($project->due_date))
                        <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                    @else
                        <td> </td>
                    @endif

                    <td>{{{$project->hours_logged}}}</td>
              
                    @if((strpos($project->invoice_submitted_date, '-0001')) === false && !empty($project->invoice_submitted_date))
                        <td>{{{$project->invoice_submitted_date->format('m-d-Y')}}}</td>   
                    @else
                        <td> </td>
                    @endif
                    
                    @if((strpos($project->invoice_approval_date, '-0001')) === false && !empty($project->invoice_approval_date))
                        <td>{{{$project->invoice_approval_date->format('m-d-Y')}}}</td>
                    @else
                        <td> </td>
                    @endif
                    
                    @if((strpos($project->payment_received, '-0001')) === false && !empty($project->payment_received))
                        <td>{{{$project->payment_received->format('m-d-Y')}}}</td>
                    @else
                        <td> </td>
                    @endif
                </tr>
                @endforeach  
            </tbody>
        </table>
        {{ $projects->links() }}
    </div> 

    <!-- expanded index visible on horizontal tablet and larger -->
    <div class="section hide-on-large-only">
        <table class="striped centered">
            <thead>
                <tr>
                    <th></th>
                </tr>  
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></td>  
                </tr>
                @endforeach  
            </tbody>
        </table>
        {{ $projects->links() }}
    </div> 
</div>
</main>  
@stop