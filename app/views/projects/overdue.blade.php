@extends('layouts.master')

@section('title')
    FLIT: Overdue Projects
@stop

@section('content')
<main>
    <div class="container">
        <div class="section row">
            <h2 class="hide-on-med-and-down">Overdue Projects</h2>
            <h3 class="hide-on-large-only">Overdue Projects</h3>
        </div>

    <!-- expanded index visible on horizontal tablet and larger -->
    <div class="section hide-on-med-and-down">
        <table class="striped centered">
            <thead>
                <tr>
                    <th class="center-align">Due Date</th>
                    <th class="center-align">Name</th>
                    <th class="center-align">Status</th>
                    <th class="center-align">Client</th>
                    <th class="center-align">Contact Name</th>
                    <th class="center-align">Contact Email</th>
                    <th class="center-align">Description</th>
                </tr>
            </thead>
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
    <div id="mobile-project-index" class="section hide-on-large-only">
        <table class="striped centered">
            <thead>
                <tr>
                    <th class="center-align">Due Date</th>
                    <th class="center-align">
                        <p>Project</p>
                        <p>Client</p>
                    </th>
                </tr>
            </thead>

            @foreach($projects as $project)    
            <tr>
                <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                <td>
                    <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                    <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></p>
                </td>
            </tr>
            @endforeach
        </table>
    </div>        
</div> <!-- closes container -->      
</main>
@stop
