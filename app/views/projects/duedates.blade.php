@extends('layouts.master')

@section('title')
    Flit: All Due Dates
@stop

@section('content')
<main>
    <div class="container">

        <div>
            <h1>Upcoming Project Due Dates</h1>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <table class="striped">
                <tr>
                    <th>Due Date</th>
                    <th>Project</th>
                    <th>Project Status</th>
                    <th>Client</th>
                    <th>Project Point of Contact Name</th>
                    <th>Project Point of Contact Email</th>
                    <th>Project Description</th>
                </tr>
                @foreach($projects as $project)
                    <tr>
                        <td>{{{$project->due_date->format('m-d-Y')}}}</td>

                        <td><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></td>

                        <td>{{{$project->project_status}}}</td>

                        <td><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></td>

                        <td>{{{$project->project_poc_name}}}</td>
                        <td>{{{$project->project_poc_email}}}</td>
                        <td>{{{$project->description}}}</td>

                    </tr>
                @endforeach  
            </table>
            {{ $projects->links() }}
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">
            <table class="striped">
                <tr>
                    <th>
                        <p>Project</p>
                        <p>Project Due Date</p>
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
