@extends('layouts.master')

@section('title')
    FLIT: Project Details
@stop

@section('content')
<main>
    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="hide-on-med-and-down">Project Details</h2>
                <h3 class="hide-on-large-only">Project Details</h3>
            </div>
    
            <div class="row">
                <div class="col s12 center-align">
                    <h4>{{{$project->name}}}</h4>
                </div>
                <div class="col s12 center-align">
                    <h6>{{{$project->description}}}</h6>
                </div>
            </div>
        </div> <!-- ends head section -->
                
        <div class="section">
            <table class="centered striped">
                <thead>
                    <tr>
                        <th class="center-align">Client</th> 
                        <th class="center-align hide-on-med-and-down">Project Status</th> 
                        <th class="center-align">Due Date</th>
                        <th class="center-align hide-on-med-and-down">Budgeted Amount</th>
                        <th class=" center-align hide-on-med-and-down">Est. Payment Date</th>    
                    </tr>    
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{action('ClientsController@show', $project->client_id)}}">{{{$project->client->client_name}}}</a></td>

                        <td class="hide-on-med-and-down">
                            <p>{{$project->project_status}} </p>
                            <a href="{{action('ProjectsController@edit', $project->id)}}">update status</a>
                        </td>
                        <td>{{{$project->due_date->format('m-d-Y')}}}</td>

                        <td class="hide-on-med-and-down">${{{number_format($project->budgeted_amount, 2)}}}</td>

                        <td class="hide-on-med-and-down">{{{((strpos($project->pay_date, '-0001'))===false && !empty($project->pay_date)) ? $project->pay_date->format('m-d-Y') : ''}}}</td>
                    </tr>     
                </tbody> 
            </table>
        </div>   <!-- closes client section  -->

        <div class="section">
            <table class="centered striped">
                <thead>
                    <tr>
                        <th class="center-align">Project Submitted</th>
                        <th class="center-align hide-on-med-and-down">Hours Logged</th>
                        <th class="center-align hide-on-med-and-down">Invoice Submitted</th>
                        <th class="center-align hide-on-med-and-down">Invoice Approved</th>
                        <th class="center-align hide-on-med-and-down">Payment Received</th>
                        <th class="center-align">Actual Payment</th>
                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td>{{{((strpos($project->project_submitted_date, '-0001'))===false && !empty($project->project_submitted_date)) ? $project->project_submitted_date->format('m-d-Y') : ''}}}</td>

                        <td>{{{$project->hours_logged}}}</td>

                        <td class="hide-on-med-and-down">{{{((strpos($project->invoice_submitted_date, '-0001'))===false && !empty($project->invoice_submitted_date)) ? $project->invoice_submitted_date->format('m-d-Y') : ''}}}</td>

                        <td class="hide-on-med-and-down">{{{((strpos($project->invoice_approval_date, '-0001'))===false && !empty($project->invoice_approval_date)) ? $project->invoice_approval_date->format('m-d-Y') : ''}}}</td>

                        <td class="hide-on-med-and-down">{{{((strpos($project->payment_received, '-0001'))===false && !empty($project->payment_received)) ? $project->payment_received->format('m-d-Y') : ''}}}</td>

                        <td>${{{number_format($project->actual_amount, 2)}}}</td>
                    </tr>
                </tbody>  
            </table>
        </div> <!-- closes project section -->

        <div class="section">
            <table class="centered striped">
                <thead>
                    <tr>
                        <th class="center-align">Contact</th>
                        <th class="center-align hide-on-med-and-down">Phone</th>
                        <th class="center-align">Email</th>
                        <th class="center-align hide-on-med-and-down">Address</th>
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
        </div> <!-- closes contact section -->

        <div class="section">
            <table class="centered striped">
                <thead>
                    <tr>
                        <th class="center-align">Project Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{{$project->project_notes}}}</td>
                    </tr>
                    <tr>
                        <td><a href="{{{action('ProjectsController@edit', $project->id)}}}">Add some notes</a>
                </tbody>
            </table>
        </div>

        <div class="section hide-on-med-and-down">
            <div class="row center-align">
                <div class="col s6">
                    <a href="{{{action('ProjectsController@edit', $project->id)}}}" class="waves-effect waves-light btn edit-btn">Edit Project</a>
                </div>

                <div class="col s6">
                    <!-- Modal Trigger -->
                    <button data-target="modal1" class="btn modal-trigger delete-btn">Delete Project</button>
                </div>
            </div> 
        </div>

        <div class="section hide-on-large-only">
            <div class="row center-align">
                <div class="col s12">
                    <a href="{{{action('ProjectsController@edit', $project->id)}}}" class="waves-effect waves-light btn edit-btn">Edit Project</a>
                </div>
            </div>

            <div class="row center-align">
                <div class="col s12">
                    <!-- Modal Trigger -->
                    <button data-target="modal1" class="btn modal-trigger delete-btn">Delete Project</button>
                </div>
            </div> 
        </div>
    
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
