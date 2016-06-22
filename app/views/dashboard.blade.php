@extends('layouts.master')

@section('title')
    FLIT: Dashboard
@stop

@section('content')
<main>
    <div class="container">
        <div>
            <div class="row">
                <h3>Welcome {{{Auth::user()->first_name}}}</h3>
            </div>

            <div class="row">
                <div class="col s12 center-align">
                    <!-- new projects -->
                    <a class="tooltipped" data-position="top" data-tooltip="Add New Project" href="{{{action('ProjectsController@create')}}}"><i class="z-depth-1 folder-icon medium material-icons">create_new_folder</i></a>
            
                    <!-- new contact -->
                    <a class="tooltipped" data-position="top" data-tooltip="Add New Client" href="{{{action('ClientsController@create')}}}"><i class="z-depth-1 person-icon medium material-icons">person_add</i></a>
                
                    <!-- due dates -->
                     <a class="tooltipped" data-position="top" data-tooltip="View Due Dates" href="{{{action('ProjectsController@showDueDates')}}}"><i class="z-depth-1 cal-icon medium material-icons">today</i></a>
              
                    <!-- late projects -->
                     <a class="tooltipped" data-position="bottom" data-tooltip="View Late Projects" href="{{{action('ProjectsController@showOverdue')}}}"><i class="z-depth-1 late-icon medium material-icons">assignment_late</i></a>

                    <!-- all contacts -->
                    <a class="tooltipped" data-position="bottom" data-tooltip="View All Clients" href="{{{action('ClientsController@index')}}}"><i class="z-depth-1 group-icon medium material-icons">group</i></a>

                    <!-- pay dates -->
                    <a class="tooltipped" data-position="bottom" data-tooltip="View Pay Dates" href="{{{action('ProjectsController@showPayDates')}}}"><i class="z-depth-1 money-icon medium material-icons">monetization_on</i></a>
                </div>
            </div>   

            <div class="row">
                <div class="col s12 center-align">
                    <p class="flow-text">Projects Overdue: {{{$overdueProjects}}}</p>
                </div>
            </div>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <table class="striped centered responsive-table">
            <h4>30 Day View</h4>
                <thead>
                    <tr>
                        <th data-field="project">Project</th>
                        <th data-field="dueDates">Project Due Date</th>
                        <th data-field="description" class="truncate">Description</th>
                    </tr>
                </thead>

                <tbody>
                        @foreach($projects as $project)
                    <tr>
                        <td><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></td>
                        <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                        <td>{{{$project->description}}}</td>
                    </tr>
                        @endforeach
                </tbody>
          </table>
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">
            <table class="striped responsive-table">
            <h4>30 Day View</h4>
                <thead>
                    <tr>
                        <th>
                            <p class="top-align">Project</p>
                            <p>Due Date</p>
                        </th>
                        <th data-field="description" class="truncate">Description</th>
                    </tr>
                </thead>

                <tbody>
                        @foreach($projects as $project)
                    <tr>
                        <td>
                            <p><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></p>
                            <p>{{{$project->due_date->format('m-d-Y')}}}</p>
                        </td>
                        <td class="truncate">{{{$project->description}}}</td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@stop