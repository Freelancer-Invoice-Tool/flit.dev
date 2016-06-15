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

            
                <!-- <div class="col s3"> -->
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
                
            

    </div> <!-- closes container -->
       
</main>
@stop
