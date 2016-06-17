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
                    <table class="striped hide-on-med-and-down">
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
                                <td>{{{$project->due_date}}}</td>
                                <td>{{{$project->project_submitted_date}}}</td>
                                <td>{{{$project->invoice_submitted_date}}}</td> 
                                <td>{{{$project->invoice_approval_date}}}</td>
                                <td>{{{$project->pay_date}}}</td>
                                <td>{{{$project->payment_received}}}</td>
                            </tr>
                        @endforeach  
                    </table>
                    {{ $projects->links() }}
                <!-- </div> -->

                <!-- condensed index visible on vertical tablet and smaller -->
                <!-- <div class="col s3"> -->
                <div id="mobile-project-index" class="hide-on-large-only">

                    @if ($due_projects)
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
                                @if($due_project->due_date!=0 && $project->project_submitted_date==0)
                                    <tr>
                                        <td>
                                            <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$due_project->name}}}</a></p>
                                            <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$due_project->client->client_name}}}</a></p>
                                        </td>
                                        <td>{{{$due_project->due_date}}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        {{ $due_projects->links() }}
                    @endif

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
                            @foreach($projects as $project)
                                @if($project->project_submitted_date!=0 && $project->invoice_submitted_date==0)
                                    <tr>
                                        <td>
                                            <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                                            <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></p>
                                        </td>
                                        <td>{{{$project->project_submitted_date}}}</td>
                                        <!-- verify payment conditions exist for client-->
                                        <td>{{{Client::find($project->client_id)->payment_terms}}} {{{Client::find($project->client_id)->submission_or_approval}}}</td>
                                        
                                    </tr>
                                @endif
                            @endforeach
                        </table>

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
                            @foreach($projects as $project)
                                @if($project->invoice_submitted_date!=0 && $project->invoice_approval_date==0)
                                    <tr>
                                        <td>
                                            <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                                            <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></p>
                                        </td>
                                        <td>{{{$project->invoice_submitted_date}}}</td>
                                        <td>{{{Client::find($project->client_id)->payment_terms}}} {{{Client::find($project->client_id)->submission_or_approval}}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>

                    <h2>Awaiting Payment</h2>
                    <table class="striped">
                            <tr>
                                <th>
                                    <p>Project</p>
                                    <p>Client</p>
                                </th>
                                <th>Expected pay date</th>
                            </tr>
                            @foreach($projects as $project)
                                @if($project->invoice_approval_date!=0 && $project->payment_received==0)
                                    <tr>
                                        <td>
                                            <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                                            <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></p>
                                        </td>
                                        <td>{{{$project->pay_date}}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
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
                            @foreach($projects as $project)
                                @if($project->payment_received!=0)
                                    <tr>
                                        <td>
                                            <p><a href="{{{ action('ProjectsController@show', $project->id) }}}">{{{$project->name}}}</a></p>
                                            <p><a href="{{{ action('ClientsController@show', $project->client_id) }}}">{{{$project->client->client_name}}}</a></p>
                                        </td>
                                        <td>{{{$project->pay_date}}}</td>
                                        <td>{{{$project->pay_received}}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>

                    {{ $projects->links() }}
                </div>
                <!-- </div> -->



                    
                
            

    </div> <!-- closes container -->
       
</main>
@stop
