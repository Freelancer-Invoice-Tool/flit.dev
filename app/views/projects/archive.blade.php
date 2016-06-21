@extends('layouts.master')

@section('title')
    Flit: Project Archive
@stop

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <h2 class="hide-on-med-and-down">Project Archive</h2>
                <h3 class="hide-on-large-only">Project Archive</h3>   
            </div>

            <!-- expanded index visible on horizontal tablet and larger -->
            <div class="hide-on-med-and-down">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Project Submitted Date</th>
                            <th>Project Name</th>
                            <th>Project Due Date</th>
                            <th>Invoice Submitted Date</th>
                            <th>Invoice Approval Date</th>
                            <th>Payment Received Date</th>
                        </tr>  
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <td>{{{$project->project_submitted_date->format('m-d-Y')}}}</td>
                            <td><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></td>

                            @if((strpos($project->due_date, '-0001')) === false && !empty($project->due_date))
                                <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                            @else
                                <td> </td>
                            @endif

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
                        @endforeach  
                    </tbody>
                </table>
                {{ $projects->links() }}
            </div> 

            <div id="mobile-project-index" class="hide-on-large-only">
                <thead>
                    <tr>
                        <th>Project Submitted Date</th>
                        <th>Project Name</th>
                    </tr>  
                </thead>
                <tbody>
                    <tr>
                        @foreach($projects as $project)
                            <td>{{{$project->project_submitted_date->format('m-d-Y')}}}</td>
                            <td><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></td>
                        @endforeach
                    </tr>     
                </tbody>
            </div>  
        </div>
    </main>  
@stop