@extends('layouts.master')

@section('title')
    Flit: Projected Payments
@stop

@section('content')
<main>
    <div class="container">

        <div>
            <h1>Projected Payments</h1>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <table class="striped">
                <tr>
                    <th>Projected Payment Date</th>
                    <th>Project</th>
                    <th>Project Submitted</th>
                    <th>Client</th>
                    <th>Project Point of Contact Name</th>
                    <th>Project Point of Contact Email</th>
                </tr>
                @foreach($projects as $project)
                    <tr>
                        <td>{{{$project->pay_date->format('m-d-Y')}}}</td>

                        <td><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></td>

                        <td>{{{$project->project_submitted_date->format('m-d-Y')}}}</td>

                        <td><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></td>

                        <td>{{{$project->project_poc_name}}}</td>
                        <td>{{{$project->project_poc_email}}}</td>

                    </tr>
                @endforeach  
            </table>
            {{-- {{ $projects->links() }} --}}
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">
            <table class="striped">
                <tr>
                    <th>
                        <p>Project</p>
                        <p>Due Date</p>
                    </th>
                    <th>Client</th>
                </tr>

                @foreach($projects as $project)    
                <tr>
                    <td>
                        <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                        <p>{{{$project->due_date->format('m-d-Y')}}}</p>
                    </td>
                    <td><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></td>
                </tr>
                @endforeach
            </table>
        </div>        

    </div> <!-- closes container -->      
</main>
@stop
