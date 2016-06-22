@extends('layouts.master')

@section('title')
    FLIT: Projected Payments
@stop

@section('content')
<main>
    <div class="container">
        <div class="row">
            <h2 class="hide-on-med-and-down">Projected Payments</h2>
            <h3 class="hide-on-large-only">Projected Payments</h3>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <table class="striped">
                <tr>
                    <th>Projected Payment Date</th>
                    <th>Budgeted Amount</th>
                    <th>Project</th>
                    <th>Project Submit Date</th>
                    <th>Client</th>
                    <th>Project Point of Contact Name</th>
                    <th>Project Point of Contact Email</th>
                </tr>
                @foreach($projects as $project)
                    <tr>
                        @if ((strpos($project->pay_date, '-0001'))===false && !empty($project->pay_date))
                        @else
                            <td> {{{calculatePayDate($project->client, $project)}}}</td>
                        @endif

                        <td>${{{number_format($project->budgeted_amount)}}}</td>
                        <td><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></td>
                        
                        @if ((strpos($project->project_submitted_date, '-0001'))===false && !empty($project->project_submitted_date))
                            <td>{{{$project->project_submitted_date->format('m-d-Y')}}}</td>
                        @else
                            <td> </td>
                        @endif

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
                        <p>Project Due Date</p>
                    </th>
                    <th>Client</th>
                </tr>

                @foreach($projects as $project)    
                <tr>
                    <td>
                        <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                        @if ((strpos($project->due_date, '-0001'))===false && !empty($project->due_date))
                            <p>{{{$project->due_date->format('m-d-Y')}}}</p>
                        @else
                            <td> </td>
                        @endif
                    </td>
                    <td><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></td>
                </tr>
                @endforeach
            </table>
        </div>        

    </div> <!-- closes container -->      
</main>
@stop
