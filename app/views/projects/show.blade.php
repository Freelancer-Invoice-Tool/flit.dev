@extends('layouts.master')

@section('title')
    Flit: Project Details
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
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Client</th>  
                            <th>Project Due Date</th>    
                        </tr>    
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{{$project->client->client_name}}}</td>
                            <td>{{{$project->due_date}}}</td>
                        </tr>     
                    </tbody> 
                </table>

                <h4>Client Main Point of Contact</h4>
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <td>{{{$project->project_poc_name}}}</td>
                            <td>{{{$project->project_poc_phone}}}</td>
                            <td>{{{$project->project_poc_email}}}</td>
                            <td>{{{$project->project_poc_address}}}</td>
                        </tr>
                    </tbody>   
                </table>

                <p>Submitted On: {{{$project->project_submitted_date}}}</p>
                <p>Invoice Submitted On: {{{$project->invoice_submitted_date}}}</p> 
                <p>Invoice Approved On: {{{$project->invoice_approval_date}}}</p>
                <p>Pay Date: {{{$project->pay_date}}}</p>
                <p>Payment Recieved On: {{{$project->payment_received}}}</p>
            </div> 
        </div> <!-- closes row --> 

        <div class="row center-align">
            <div class="col s6">
                <a href="{{{action('ProjectsController@edit', $project->id)}}}" class="waves-effect waves-light btn">Edit Project</a>
            </div>

            <div class="col s6">
                <!-- Modal Trigger -->
                <button data-target="modal1" class="btn modal-trigger">Delete Client</button>
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
                <button type="submit" class="btn">Delete</button>
                <button class="btn"><a href="{{{ action('ProjectsController@show', $project->id) }}}" class=" modal-action modal-close">Keep</a></button>
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
