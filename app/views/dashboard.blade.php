@extends('layouts.master')

@section('title')
    Flit: Dashboard
@stop

@section('content')
<main>
    <div class="container">
        <div>
            <div class="row">
                <h3>Welcome {{{Auth::user()->first_name}}}</h3>
            </div>

            <div class="row">
                <div class="col s6 col offset-s6">
                    <!-- new projects -->
                    <a class="tooltipped" data-position="top" data-tooltip="Add New Project" href="{{{action('ProjectsController@create')}}}"><i class="z-depth-1 folder-icon medium material-icons">create_new_folder</i></a>
            
                    <!-- new contact -->
                    <a class="tooltipped" data-position="top" data-tooltip="Add New Client" href="{{{action('ClientsController@create')}}}"><i class="z-depth-1 person-icon medium material-icons">person_add</i></a>
                
                    <!-- due dates -->
                     <a class="tooltipped" data-position="top" data-tooltip="View Due Dates" href="{{{action('ProjectsController@index')}}}"><i class="z-depth-1 cal-icon medium material-icons">today</i></a>
                </div>
            </div>

            <div class="row">
                <div class="col s6 col offset-s6">
                    <!-- late projects -->
                     <a class="tooltipped" data-position="bottom" data-tooltip="View Late Projects" href="{{{action('ProjectsController@index')}}}"><i class="z-depth-1 late-icon medium material-icons">assignment_late</i></a>

                    <!-- all contacts -->
                    <a class="tooltipped" data-position="bottom" data-tooltip="View All Clients" href="{{{action('ClientsController@index')}}}"><i class="z-depth-1 group-icon medium material-icons">group</i></a>

                    <!-- pay dates -->
                    <a class="tooltipped" data-position="bottom" data-tooltip="View Pay Dates" href="{{{action('ProjectsController@index')}}}"><i class="z-depth-1 money-icon medium material-icons">monetization_on</i></a>
                </div>
            </div>   
        </div>

        <div>
            <table class="striped centered responsive-table">
            <h4>30 Day View</h4>
                <thead>
                    <tr>
                        <th data-field="project">Project</th>
                        <th data-field="dueDates">Due Date</th>
                        <th data-field="project_notes" class="truncate">Project Notes</th>
                    </tr>
                </thead>

                <tbody>
                        @foreach($projects as $project)
                    <tr>
                        <td><a href="{{{ action('ProjectsController@show', $project->id) }}}"></a>{{{$project->name}}}</td>
                        <td>{{{$project->due_date}}}</td>
                        <td>{{{$project->project_notes}}}</td>
                    </tr>
                        @endforeach
                </tbody>
          </table>
        </div>
    </div>
</main>
@stop