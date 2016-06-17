@extends('layouts.master')

@section('title')
    Flit: My Projects
@stop

@section('content')
<main>
    <div class="container">

        <div>
            <h1>Overdue Projects</h1>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <!-- <div class="col s3"> -->
        <!-- <div class="hide-on-med-and-down"> -->
            <table class="striped">
                <tr>
                    <th>Due Date</th>
                    <th>Project</th>
                    <th>Project Status</th>
                    <th>Client</th>
                    <th>Project Point of Contact Name</th>
                    <th>Project Point of Contact Email</th>
                    <th>Project Details</th>
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
        <!-- <div class="col s3"> -->
       <!--  <div id="mobile-project-index" class="hide-on-large-only">

            
        </div>        

    </div> --> <!-- closes container -->      
</main>
@stop
