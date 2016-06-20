@extends('layouts.master')

@section('title')
    FLIT: Project Details
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>Project Details</h1>
        </div>

        <div class="row">
            <div class="col s12 center-align">
                <h3>{{{$project->name}}}</h3>
                <p class="flow-text">{{{$project->description}}}</p>
                
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Client</th> 
                            <th class="hide-on-med-and-down">Project Status</th> 
                            <th>Project Due Date</th>
                            <th class="hide-on-med-and-down">Projected Payment Date</th>    
                        </tr>    
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{action('ClientsController@show', $project->client_id)}}">{{{$project->client->client_name}}}</a></td>
                            <td class="hide-on-med-and-down">{{$project->project_status}} <a href="{{action('ProjectsController@edit', $project->id)}}">update status</a> </td>
                            <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                            <td class="hide-on-med-and-down">{{{((strpos($project->pay_date, '-0001'))===false && !empty($project->pay_date)) ? $project->pay_date->format('m-d-Y') : ''}}}</td>
                        </tr>     
                    </tbody> 
                </table>
                <h4>Project Milestones</h4>
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Project Submit Date</th>
                            <th>Invoice Submit Date</th>
                            <th>Invoice Approval Date</th>
                            <th>Payment Received Date</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <td>{{{((strpos($project->project_submitted_date, '-0001'))===false && !empty($project->project_submitted_date)) ? $project->project_submitted_date->format('m-d-Y') : ''}}}</td>
                            <td>{{{((strpos($project->invoice_submitted_date, '-0001'))===false && !empty($project->invoice_submitted_date)) ? $project->invoice_submitted_date->format('m-d-Y') : ''}}}</td>
                            <td>{{{((strpos($project->invoice_approval_date, '-0001'))===false && !empty($project->invoice_approval_date)) ? $project->invoice_approval_date->format('m-d-Y') : ''}}}</td>
                            <td>{{{((strpos($project->payment_received, '-0001'))===false && !empty($project->payment_received)) ? $project->payment_received->format('m-d-Y') : ''}}}</td>
                        </tr>
                    </tbody>  
                </table>
                <h4>{{{$project->client->client_name}}} Project Point of Contact</h4>
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="hide-on-med-and-down">Phone</th>
                            <th>Email</th>
                            <th class="hide-on-med-and-down">Address</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <td>{{{$project->project_poc_name}}}</td>
                            <td class="hide-on-med-and-down">{{{$project->project_poc_phone}}}</td>
                            <td><a href="mailto:{{{$project->project_poc_email}}}">{{{$project->project_poc_email}}}</a></td>
                            <td class="hide-on-med-and-down">{{{$project->project_poc_address}}}</td>
                        </tr>
                    </tbody>   
                </table>

                <h4>Project Notes</h4>
                <a href="{{{action('ProjectsController@edit', $project->id)}}}">Add some notes</a>
                <p>{{{$project->project_notes}}}</p>

            </div> 
        </div> <!-- closes row --> 

        <div class="row center-align">
            <div class="col s6">
                <a href="{{{action('ProjectsController@edit', $project->id)}}}" class="waves-effect waves-light btn edit-btn">Edit Project</a>
            </div>

            <div class="col s6">
                <!-- Modal Trigger -->
                <button data-target="modal1" class="btn modal-trigger delete-btn">Delete Project</button>
            </div>
        </div> 
    </div> <!-- closes container -->
    
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <form method="POST" action="{{{action('ProjectsController@destroy', $project->id)}}}">
        {{Form::token()}}
            <input type="hidden" name="_method" value="DELETE">
            <div class="modal-content">
                <h4>Are You Sure?</h4>
                <p>If you delete this project, you won't be able to retrieve it!</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn delete-btn">Delete</button>
                <button class="btn edit-btn"><a href="{{{ action('ProjectsController@show', $project->id) }}}" class="modal-action modal-close">Keep</a></button>
            </div>
        </form>
        
    </div>     
</main>
@stop

@section('bottom-script')
    <script>
        $(document).ready(function(){
            $('.modal-trigger').leanModal();
          });
    </script>
@stop
