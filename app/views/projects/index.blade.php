@extends('layouts.master')

@section('title')
    FLIT: My Projects
@stop

@section('top-script')
    
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
                <div class="col s12 right-align">
                    <a href="{{{action('ProjectsController@showArchive', Auth::id())}}}">View Project Archive</a>
                </div>
            </div>

            <div class="row hide-on-med-and-down">
                <div class="row">
                    <p>Filter projects:</p>
                </div>
                <div class="row">
                    <div class="col s3">
                        <input type="checkbox" id="projects_due" name="projects_due" checked>
                        <label for="projects_due">Projects due
                    </label>
                    </div>

                    <div class="col s3">
                        <input type="checkbox" id="projects_to_invoice" name="projects_to_invoice" checked>
                        <label for="projects_to_invoice">Needs invoice</label>
                    </div>

                    <div class="col s3">
                        <input type="checkbox" id="projects_needing_approval" name="projects_needing_approval" checked>
                        <label for="projects_needing_approval">Awaiting approval</label>
                    </div>

                    <div class="col s3">
                        <input type="checkbox" id="projects_awaiting_payment" name="projects_awaiting_payment" checked>
                        <label for="projects_awaiting_payment">Awaiting payment</label>
                    </div>
                </div>
            </div>

            
        </div>
        
        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <div class="section">
                <table class="striped centered" id="example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Client</th>
                            <th>Due Date
                                <span style="visibility:hidden">longdatehere</span></th>
                            <th>Project Submitted</th>
                            <th>Invoice Submitted</th>
                            <th>Invoice Approved</th>
                            <th>Projected Payment</th>
                            <th>Payment Received</th>
                        </tr>   
                    </thead>
                    
                    <tbody>
                        {{-- <div id="proj_due"> --}}
                            @if ($due_projects->count()>0)
                                @foreach($due_projects as $due_project)
                                    <tr class="proj_due" id="proj_due">
                                        <td><a href="{{{ action('ProjectsController@show', $due_project->id) }}}">{{{$due_project->name}}}</a></td>
                                        <td><a href="{{{ action('ClientsController@show', $due_project->client_id) }}}">{{{$due_project->client->client_name}}}</a></td>
                                        <td>{{{$due_project->due_date->format('m-d-Y')}}}</td>
                                        @if (Project::checkForDate($due_project->project_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($due_project->invoice_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td> 
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($due_project->invoice_approval_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($due_project->pay_date))
                                            <td>{{{$due_project->pay_date->format('m-d-Y')}}}</td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($due_project->payment_received))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        {{-- </div> --}}

                        {{-- <div id="proj_to_invoice"> --}}
                            @if ($needs_invoice->count()>0)
                                @foreach($needs_invoice as $uninvoiced_project)
                                    <tr class="proj_to_invoice" id="proj_to_invoice">
                                        <td><a href="{{{ action('ProjectsController@show', $uninvoiced_project->id) }}}">{{{$uninvoiced_project->name}}}</a></td>
                                        <td><a href="{{{ action('ClientsController@show', $uninvoiced_project->client_id) }}}">{{{$uninvoiced_project->client->client_name}}}</a></td>
                                        <td><i class="material-icons checkboxes">&#xE5CA;</i>
                                        @if (Project::checkForDate($uninvoiced_project->project_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($uninvoiced_project->invoice_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td> 
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($uninvoiced_project->invoice_approval_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($uninvoiced_project->pay_date))
                                            <td>{{{$uninvoiced_project->pay_date->format('m-d-Y')}}}</td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($uninvoiced_project->payment_received))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        {{-- </div> --}}

                        {{-- <div id="proj_need_approval"> --}}
                            @if ($needs_approval->count()>0)
                                @foreach($needs_approval as $unapproved_project)
                                    <tr class="proj_need_approval" id="proj_need_approval">
                                        <td><a href="{{{ action('ProjectsController@show', $unapproved_project->id) }}}">{{{$unapproved_project->name}}}</a></td>
                                        <td><a href="{{{ action('ClientsController@show', $unapproved_project->client_id) }}}">{{{$unapproved_project->client->client_name}}}</a></td>
                                        <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @if (Project::checkForDate($unapproved_project->project_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unapproved_project->invoice_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td> 
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unapproved_project->invoice_approval_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unapproved_project->pay_date))
                                            <td>{{{$unapproved_project->pay_date->format('m-d-Y')}}}</td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unapproved_project->payment_received))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        {{-- </div> --}}
                        
                        {{-- <div id="proj_await_pay">                  --}}
                            @if ($awaiting_payment->count()>0)
                                @foreach($awaiting_payment as $unpaid_project)
                                    <tr class="proj_await_pay" id="proj_await_pay">
                                        <td><a href="{{{ action('ProjectsController@show', $unpaid_project->id) }}}">{{{$unpaid_project->name}}}</a></td>
                                        <td><a href="{{{ action('ClientsController@show', $unpaid_project->client_id) }}}">{{{$unpaid_project->client->client_name}}}</a></td>
                                        <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @if (Project::checkForDate($unpaid_project->project_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unpaid_project->invoice_submitted_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td> 
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unpaid_project->invoice_approval_date))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unpaid_project->pay_date))
                                            <td>{{{$unpaid_project->pay_date->format('m-d-Y')}}}</td>
                                        @else
                                            <td> </td>
                                        @endif
                                        @if (Project::checkForDate($unpaid_project->payment_received))
                                            <td><i class="material-icons checkboxes">&#xE5CA;</i></td>
                                        @else
                                            <td> </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        {{-- </div>                               --}}
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


@section('bottom-script')

<script>

    $(projects_due).change(function(){
        if ($('#projects_due').prop("checked")){
            console.log('its checked!');
            $('.proj_due').removeClass('hide');
        } else {
            console.log('unchecked');
            $('.proj_due').addClass('hide');
        }
    });

    $(projects_to_invoice).change(function(){
        if ($('#projects_to_invoice').prop("checked")){
            console.log('its checked!');
            $('.proj_to_invoice').removeClass('hide');
        } else {
            console.log('unchecked');
            $('.proj_to_invoice').addClass('hide');
        }
    });

    $(projects_needing_approval).change(function(){
        if ($('#projects_needing_approval').prop("checked")){
            console.log('its checked!');
            $('.proj_need_approval').removeClass('hide');
        } else {
            console.log('unchecked');
            $('.proj_need_approval').addClass('hide');
        }
    });

    $(projects_awaiting_payment).change(function(){
        if ($('#projects_awaiting_payment').prop("checked")){
            console.log('its checked!');
            $('.proj_await_pay').removeClass('hide');
        } else {
            console.log('unchecked');
            $('.proj_await_pay').addClass('hide');
        }
    });


</script>

@stop