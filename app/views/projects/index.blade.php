@extends('layouts.master')

@section('title')
    Flit: My Projects
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>All Projects</h1>
        </div>

    <!--foreach loop here to propagate data, will also need paginate/row thing prob  -->

                <!-- expanded index visible on horizontal tablet and larger -->
                <!-- <div class="col s3"> -->
                <div class="hide-on-med-and-down">
                    <table class="striped">
                        <tr>
                            <th>Project</th>
                            <th>Client</th>
                            <th>Due Date</th>
                            <th>Project Submitted</th>
                            <th>Invoice Submitted</th>
                            <th>Invoice Approved</th>
                            <th>Pay Date</th>
                            <th>Payment Received</th>
                        </tr>
                        @foreach($projects as $project)
                            <tr>
                                <td><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></td>
                                <td><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></td>
                                <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                                @if ((strpos($project->project_submitted_date, '-0001'))===false)
                                <td>{{{$project->project_submitted_date->format('m-d-Y')}}}</td>
                                @else
                                <td> </td>
                                @endif
                                @if ((strpos($project->invoice_submitted_date, '-0001'))===false)
                                <td>{{{$project->invoice_submitted_date->format('m-d-Y')}}}</td> 
                                @else
                                <td> </td>
                                @endif
                                @if ((strpos($project->invoice_approval_date, '-0001'))===false)
                                <td>{{{$project->invoice_approval_date->format('m-d-Y')}}}</td>
                                @else
                                <td> </td>
                                @endif
                                @if ((strpos($project->pay_date, '-0001'))===false)
                                <td>{{{$project->pay_date->format('m-d-Y')}}}</td>
                                @else
                                <td> </td>
                                @endif
                                @if ((strpos($project->payment_received, '-0001'))===false)
                                <td>{{{$project->payment_received}}}</td>
                                @else
                                <td> </td>
                                @endif
                            </tr>
                        @endforeach  
                    </table>
                    {{ $projects->links() }}
                </div>

                <!-- condensed index visible on vertical tablet and smaller -->
                <!-- <div class="col s3"> -->
                <div id="mobile-project-index" class="hide-on-large-only">

                    @if ($due_projects->count()>0)
                        <h2>Projects Due</h2>
                        <table class="striped">
                            <tr>
                                <th>
                                    <p>Project</p>
                                    <p>Client</p>
                                </th>
                                <th>Due Date</th>
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
                                <th>Project Submitted</th>
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
                                <th>Invoice Submitted</th>
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
                                <th>Expected pay date</th>
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
                                <th>Expected pay date</th>
                                <th>Actual pay date</th>
                            </tr>
                            @foreach($project_completed as $completed_project)
                                <tr>
                                    <td>
                                        <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$completed_project->name}}}</a></p>
                                        <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$completed_project->client->client_name}}}</a></p>
                                    </td>
                                    <td>{{{$completed_project->pay_date->format('m-d-Y')}}}</td>
                                    <td>{{{$completed_project->payment_received}}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
                <!-- </div> -->



                    
                
            

    </div> <!-- closes container -->
       
</main>
@stop
