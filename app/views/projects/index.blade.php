@extends('layouts.master')

@section('title')
    FLIT: My Projects
@stop

@section('content')
<main>
    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="hide-on-med-and-down">All Projects</h2>
                <h3 class="hide-on-large-only">All Projects</h3>
            </div>

            <div class="row">
                <div class="col s12 right-align btn-margin">
                    <a class="waves-effect waves-light btn edit-btn" href="{{{action('ProjectsController@create')}}}">Create New Project</a>
                </div>
            </div>
            <div class="row">
                <div class="col s6 left-align">
                    <a href="{{{action('ProjectsController@showArchive', Auth::id())}}}">View Project Archive</a>
                </div>
            </div>
        </div>
        
        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <div class="section">
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Client</th>
                            <th>Due Date</th>
                            <th>Project Submitted</th>
                            <th>Invoice Submitted</th>
                            <th>Invoice Approved</th>
                            <th>Projected Payment</th>
                            <th>Payment Received</th>
                        </tr>   
                    </thead>
                    <tbody>
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
                                @if ($project->pay_date=0)
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
                    </tbody>
                </table>
            </div>

            <div class="section">
                {{ $projects->links() }}
            </div>

        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">
        
            @if ($due_projects->count()>0)
            <div class="section">
                <h4>Projects Due</h4>
                <table class="striped centered">
                    <tr>
                        <th class="center-align">Due Date</th>
                        <th class="center-align">
                            <p>Name</p>
                            <p>Client</p>
                        </th>
                    </tr>
                    @foreach($due_projects as $due_project)
                        <tr>
                            <td>{{{$due_project->due_date->format('m-d-Y')}}}</td>
                            <td>
                                <p><a href="{{{ action('ProjectsController@show', $due_project->id) }}}">{{{$due_project->name}}}</a></p>
                                <p><a href="{{{ action('ClientsController@show', $due_project->client_id) }}}">{{{$due_project->client->client_name}}}</a></p>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @endif

            @if($needs_invoice->count()>0)
            <div class="section">
                <h4>Needs Invoice Issued</h4>
                <table class="striped centered">
                    <tr>
                        <th class="center-align">
                            <p>Name</p>
                            <p>Client</p>
                        </th>
                        <th class="center-align">Submittal Date</th>
                        <th class="center-align">Conditions</th>
                    </tr>
                    @foreach($needs_invoice as $uninvoiced_project)
                            <tr>
                                <td>
                                    <p><a href="{{{ action('ProjectsController@show', $uninvoiced_project->id) }}}">{{{$uninvoiced_project->name}}}</a></p>
                                    <p><a href="{{{ action('ClientsController@show', $uninvoiced_project->client_id) }}}">{{{$uninvoiced_project->client->client_name}}}</a></p>
                                </td>
                                <td>{{{$uninvoiced_project->project_submitted_date->format('m-d-Y')}}}</td>
                                <!-- verify payment conditions exist for client-->
                                <td>{{{Client::find($uninvoiced_project->client_id)->payment_terms}}} {{{Client::find($uninvoiced_project->client_id)->submission_or_approval}}}</td>
                            </tr>
                    @endforeach
                </table>
            </div>
            @endif

            @if($needs_approval->count()>0)
            <div class="section">
                <h4>Invoice Needs Approval</h4>
                <table class="striped centered">
                    <tr>
                        <th class="center-align">
                            <p>Name</p>
                            <p>Client</p>
                        </th>
                        <th class="center-align">Submittal Date</th>
                        <th class="center-align">Conditions</th>
                    </tr>
                    @foreach($needs_approval as $unapproved_project)
                        <tr>
                            <td>
                                <p><a href="{{{ action('ProjectsController@show', $unapproved_project->id) }}}">{{{$unapproved_project->name}}}</a></p>
                                <p><a href="{{{ action('ClientsController@show', $unapproved_project->client_id) }}}">{{{$unapproved_project->client->client_name}}}</a></p>
                            </td>
                            <td>{{{$project->invoice_submitted_date->format('m-d-Y')}}}</td>
                            <td>{{{Client::find($unapproved_project->client_id)->payment_terms}}} {{{Client::find($unapproved_project->client_id)->submission_or_approval}}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @endif

            @if($awaiting_payment->count()>0)
            <div class="section">
                <h4>Awaiting Payment</h4>
                <table class="striped centered">
                    <tr>
                        <th class="center-align">Payment Date</th>
                        <th class="center-align">
                            <p>Name</p>
                            <p>Client</p>
                        </th>
                    </tr>
                    @foreach($awaiting_payment as $unpaid_project)
                        
                            <tr>
                                <td>{{{$unpaid_project->pay_date->format('m-d-Y')}}}</td>
                                <td>
                                    <p><a href="{{{ action('ProjectsController@show', $unpaid_project->id) }}}">{{{$unpaid_project->name}}}</a></p>
                                    <p><a href="{{{ action('ClientsController@show', $unpaid_project->client_id) }}}">{{{$unpaid_project->client->client_name}}}</a></p>
                                </td>
                            </tr>
                    @endforeach
                </table>
            </div>
            @endif
        </div>         
    </div> <!-- closes container -->      
</main>
@stop
