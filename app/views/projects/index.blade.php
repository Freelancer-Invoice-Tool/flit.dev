@extends('layouts.master')

@section('title')
    FLIT: My Projects
@stop

@section('content')
<main>
    <div class="container">
        <div class="row">
            <h2 class="hide-on-med-and-down">All Projects</h2>
            <h3 class="hide-on-large-only">All Projects</h3>
        </div>

        <div class="right-align btn-margin">
            <a class="waves-effect waves-light btn edit-btn" href="{{{action('ProjectsController@create')}}}">Create New Project</a>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <table class="striped">
                <tr>
                    <th>Project</th>
                    <th>Client</th>
                    <th>Project Due Date</th>
                    <th>Project Submit Date</th>
                    <th>Invoice Submit Date</th>
                    <th>Invoice Approval Date</th>
                    <th>Projected Payment Date</th>
                    <th>Payment Received Date</th>
                </tr>
                @foreach($projects as $project)
                    <tr>
                        <td><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></td>
                        <td><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></td>
                        <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                        @if ((strpos($project->project_submitted_date, '-0001'))===false && !empty($project->project_submitted_date))
                        <td>{{{$project->project_submitted_date->format('m-d-Y')}}}</td>
                        @else
                        <td> </td>
                        @endif
                        @if ((strpos($project->invoice_submitted_date, '-0001'))===false && !empty($project->invoice_submitted_date))
                        <td>{{{$project->invoice_submitted_date->format('m-d-Y')}}}</td> 
                        @else
                        <td> </td>
                        @endif
                        @if ((strpos($project->invoice_approval_date, '-0001'))===false && !empty($project->invoice_approval_date))
                        <td>{{{$project->invoice_approval_date->format('m-d-Y')}}}</td>
                        @else
                        <td> </td>
                        @endif
                        @if ((strpos($project->pay_date, '-0001')==false && !empty($project->pay_date)) || (strpos($project->pay_date, '0000')==false && !empty($project->pay_date)))
                        <td>{{{calculatePayDate($project->client, $project)->format('m-d-Y')}}}</td>
                        @else
                        <td> </td>
                        @endif
                        @if ((strpos($project->payment_received, '-0001'))===false && !empty($project->payment_received))
                        <td>{{{$project->payment_received->format('m-d-Y')}}}</td>
                        @else
                        <td> </td>
                        @endif
                    </tr>
                @endforeach  
            </table>
            {{ $projects->links() }}
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">

            @if ($due_projects->count()>0)
                <h2>Projects Due</h2>
                <table class="striped">
                    <tr>
                        <th>
                            <p>Project</p>
                            <p>Client</p>
                        </th>
                        <th>Project Due Date</th>
                    </tr>
                    @foreach($due_projects as $due_project)
                        
                            <tr>
                                <td>
                                    <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$due_project->name}}}</a></p>
                                    <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$due_project->client->client_name}}}</a></p>
                                </td>
                                <td>{{{$due_project->due_date->format('m-d-Y')}}}</td>
                            </tr>
                       
                    @endforeach
                </table>
            @endif

            @if($needs_invoice->count()>0)
                <h2>Needs Invoice Issued</h2>
                <table class="striped">
                    <tr>
                        <th>
                            <p>Project</p>
                            <p>Client</p>
                        </th>
                        <th>Project Submit Date</th>
                        <th>Conditions</th>
                    </tr>
                    @foreach($needs_invoice as $uninvoiced_project)
                            <tr>
                                <td>
                                    <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$uninvoiced_project->name}}}</a></p>
                                    <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$uninvoiced_project->client->client_name}}}</a></p>
                                </td>
                                <td>{{{$uninvoiced_project->project_submitted_date->format('m-d-Y')}}}</td>
                                <!-- verify payment conditions exist for client-->
                                <td>{{{Client::find($uninvoiced_project->client_id)->payment_terms}}} {{{Client::find($uninvoiced_project->client_id)->submission_or_approval}}}</td>
                            </tr>
                    @endforeach
                </table>
            @endif

            @if($needs_approval->count()>0)
                <h2>Invoice Needs Approval</h2>
                <table class="striped">
                    <tr>
                        <th>
                            <p>Project</p>
                            <p>Client</p>
                        </th>
                        <th>Invoice Submit Date</th>
                        <th>Conditions</th>
                    </tr>
                    @foreach($needs_approval as $unapproved_project)
                        <tr>
                            <td>
                                <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$unapproved_project->name}}}</a></p>
                                <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$unapproved_project->client->client_name}}}</a></p>
                            </td>
                            <td>{{{$project->invoice_submitted_date->format('m-d-Y')}}}</td>
                            <td>{{{Client::find($unapproved_project->client_id)->payment_terms}}} {{{Client::find($unapproved_project->client_id)->submission_or_approval}}}</td>
                        </tr>
                    @endforeach
                </table>
            @endif

            @if($awaiting_payment->count()>0)
                <h2>Awaiting Payment</h2>
                <table class="striped">
                    <tr>
                        <th>
                            <p>Project</p>
                            <p>Client</p>
                        </th>
                        <th>Projected Payment Date</th>
                    </tr>
                    @foreach($awaiting_payment as $unpaid_project)
                        
                            <tr>
                                <td>
                                    <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$unpaid_project->name}}}</a></p>
                                    <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$unpaid_project->client->client_name}}}</a></p>
                                </td>
                                <td>{{{$unpaid_project->pay_date->format('m-d-Y')}}}</td>
                            </tr>
                    @endforeach
                </table>
            @endif

            @if($project_completed->count()>0)
                <h2>Project Completed</h2>
                <table class="striped">
                    <tr>
                        <th>
                            <p>Project</p>
                            <p>Client</p>
                        </th>
                        <th>Projected Payment Date</th>
                        <th>Actual Payment Date</th>
                    </tr>
                    @foreach($project_completed as $completed_project)
                        <tr>
                            <td>
                                <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$completed_project->name}}}</a></p>
                                <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$completed_project->client->client_name}}}</a></p>
                            </td>
                            <td>{{{$completed_project->pay_date->format('m-d-Y')}}}</td>
                            <td>{{{$completed_project->payment_received->format('m-d-Y')}}}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>         
    </div> <!-- closes container -->      
</main>
@stop
