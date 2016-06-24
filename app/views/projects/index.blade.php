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
                    @if ($due_projects->count()>0)
                        @foreach($due_projects as $due_project)
                            <tr>
                                <td><a href="{{{ action('ProjectsController@show', $due_project->id) }}}">{{{$due_project->name}}}</a></td>
                                <td><a href="{{{ action('ClientsController@show', $due_project->client_id) }}}">{{{$due_project->client->client_name}}}</a></td>
                                <td>{{{$due_project->due_date->format('m-d-Y')}}}</td>
                                @if (Project::checkForDate($due_project->project_submitted_date))
                                    <td>{{{$due_project->project_submitted_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($due_project->invoice_submitted_date))
                                    <td>{{{$due_project->invoice_submitted_date->format('m-d-Y')}}}</td> 
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($due_project->invoice_approval_date))
                                    <td>{{{$due_project->invoice_approval_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if ($due_project->pay_date=0)
                                    <td>{{{calculatePayDate($due_project->client, $due_project)->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($due_project->payment_received))
                                    <td>{{{$due_project->payment_received->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif

                    @if ($needs_invoice->count()>0)
                        @foreach($needs_invoice as $uninvoiced_project)
                            <tr>
                                <td><a href="{{{ action('ProjectsController@show', $uninvoiced_project->id) }}}">{{{$uninvoiced_project->name}}}</a></td>
                                <td><a href="{{{ action('ClientsController@show', $uninvoiced_project->client_id) }}}">{{{$uninvoiced_project->client->client_name}}}</a></td>
                                <td>{{{$uninvoiced_project->due_date->format('m-d-Y')}}}</td>
                                @if (Project::checkForDate($uninvoiced_project->project_submitted_date))
                                    <td>{{{$uninvoiced_project->project_submitted_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($uninvoiced_project->invoice_submitted_date))
                                    <td>{{{$uninvoiced_project->invoice_submitted_date->format('m-d-Y')}}}</td> 
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($uninvoiced_project->invoice_approval_date))
                                    <td>{{{$uninvoiced_project->invoice_approval_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if ($uninvoiced_project->pay_date=0)
                                    <td>{{{calculatePayDate($uninvoiced_project->client, $uninvoiced_project)->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($uninvoiced_project->payment_received))
                                    <td>{{{$uninvoiced_project->payment_received->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif

                    @if ($needs_approval->count()>0)    
                        @foreach($needs_approval as $unapproved_project)
                            <tr>
                                <td><a href="{{{ action('ProjectsController@show', $unapproved_project->id) }}}">{{{$unapproved_project->name}}}</a></td>
                                <td><a href="{{{ action('ClientsController@show', $unapproved_project->client_id) }}}">{{{$unapproved_project->client->client_name}}}</a></td>
                                <td>{{{$unapproved_project->due_date->format('m-d-Y')}}}</td>
                                @if (Project::checkForDate($unapproved_project->project_submitted_date))
                                    <td>{{{$unapproved_project->project_submitted_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($unapproved_project->invoice_submitted_date))
                                    <td>{{{$unapproved_project->invoice_submitted_date->format('m-d-Y')}}}</td> 
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($unapproved_project->invoice_approval_date))
                                    <td>{{{$unapproved_project->invoice_approval_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if ($unapproved_project->pay_date=0)
                                    <td>{{{calculatePayDate($unapproved_project->client, $unapproved_project)->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($unapproved_project->payment_received))
                                    <td>{{{$unapproved_project->payment_received->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                        
                        @foreach($awaiting_payment as $unpaid_project)
                            <tr>
                                <td><a href="{{{ action('ProjectsController@show', $unpaid_project->id) }}}">{{{$unpaid_project->name}}}</a></td>
                                <td><a href="{{{ action('ClientsController@show', $unpaid_project->client_id) }}}">{{{$unpaid_project->client->client_name}}}</a></td>
                                <td>{{{$unpaid_project->due_date->format('m-d-Y')}}}</td>
                                @if (Project::checkForDate($unpaid_project->project_submitted_date))
                                    <td>{{{$unpaid_project->project_submitted_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($unpaid_project->invoice_submitted_date))
                                    <td>{{{$unpaid_project->invoice_submitted_date->format('m-d-Y')}}}</td> 
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($unpaid_project->invoice_approval_date))
                                    <td>{{{$unpaid_project->invoice_approval_date->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if ($unpaid_project->pay_date=0)
                                    <td>{{{calculatePayDate($unpaid_project->client, $unpaid_project)->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                                @if (Project::checkForDate($unpaid_project->payment_received))
                                    <td>{{{$unpaid_project->payment_received->format('m-d-Y')}}}</td>
                                @else
                                    <td> </td>
                                @endif
                            </tr>
                        @endforeach
                              
                    </tbody>
                </table>
            </div>

            <div class="section">
                <ul class="pagination center-align">
                    {{ $paginator->render() }}
                </ul>    
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
                            <td>
                                <p><a href="{{{ action('ProjectsController@show', $due_project->id) }}}">{{{$due_project->name}}}</a></p>
                                <p><a href="{{{ action('ClientsController@show', $due_project->client_id) }}}">{{{$due_project->client->client_name}}}</a></p>
                            </td>
                            <td>{{{$due_project->due_date->format('m-d-Y')}}}</td>
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
                            <td>{{{$unapproved_project->invoice_submitted_date->format('m-d-Y')}}}</td>
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
                        <th class="center-align">
                            <p>Name</p>
                            <p>Client</p>
                        </th>
                        <th class="center-align">Payment Date</th>
                    </tr>
                    @foreach($awaiting_payment as $unpaid_project)
                        
                            <tr>
                                <td>
                                    <p><a href="{{{ action('ProjectsController@show', $unpaid_project->id) }}}">{{{$unpaid_project->name}}}</a></p>
                                    <p><a href="{{{ action('ClientsController@show', $unpaid_project->client_id) }}}">{{{$unpaid_project->client->client_name}}}</a></p>
                                </td>
                                @if (Project::checkForDate($unpaid_project->pay_date))
                                    <td>{{{$unpaid_project->pay_date->format('m-d-Y')}}}</td>
                                @endif
                            </tr>
                    @endforeach
                </table>
            </div>
            @endif
        </div>         
    </div> <!-- closes container -->      
</main>
@stop
