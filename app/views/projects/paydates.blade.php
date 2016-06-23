@extends('layouts.master')

@section('title')
    FLIT: Projected Payments
@stop

@section('content')
<main>
    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="hide-on-med-and-down">Projected Payments</h2>
                <h3 class="hide-on-large-only">Projected Payments</h3>
            </div>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <table class="striped centered">
                <thead>
                    <tr>
                        <th class="center-align">Payment Date</th>
                        <th class="center-align">Budgeted Amount</th>
                        <th class="center-align">Project</th>
                        <th class="center-align">Project Submitted</th>
                        <th class="center-align">Client</th>
                        <th class="center-align">Contact Name</th>
                        <th class="center-align">Contact Email</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($projects as $project)
                    <tr>
                        @if ((strpos($project->pay_date, '-0001'))===false && !empty($project->pay_date))
                            <td>{{{$project->pay_date}}}</td>
                        @else
                            <td> </td>
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
                </tbody>  
            </table>
            {{-- {{ $projects->links() }} --}}
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">
            <table class="striped centered">
                <thead>
                    <tr>
                        <th class="center-align">Due Date</th>
                        <th class="center-align">
                            <p>Client</p>
                            <p>Project</p>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($projects as $project)    
                    <tr>
                        <td>
                            @if ((strpos($project->due_date, '-0001'))===false && !empty($project->due_date))
                                <p>{{{$project->due_date->format('m-d-Y')}}}</p>
                            @else
                                <td> </td>
                            @endif

                        </td>

                        <td>
                            <a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a>

                            <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div> <!-- closes container -->      
</main>
@stop
