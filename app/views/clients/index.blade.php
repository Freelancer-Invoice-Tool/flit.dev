@extends('layouts.master')

@section('title')
    FLIT: My Clients
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>All Clients</h1>
        </div>
        <div class="right-align btn-margin">
            <a class="waves-effect waves-light btn edit-btn" href="{{{action('ClientsController@create')}}}">Create New Client</a>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="hide-on-med-and-down">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Main POC Name</th>
                        <th>Main POC Phone Number</th>
                        <th>Main POC Email</th>
                        <th>Main POC Address</th>
                    </tr>
                </thead>  
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                             <td><a href="{{{ action('ClientsController@show', $client->id) }}}">{{{$client->client_name}}}</a></td>
                             <td>{{{$client->main_poc_name}}}</td>
                             <td>{{{$client->main_poc_phone}}}</td>
                             <td><a href="mailto:{{{$client->main_poc_email}}}"></a>{{{$client->main_poc_email}}}</td>
                             <td>{{{$client->main_poc_address}}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Main POC Email</th>
                    </tr>
                </thead>  
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                             <td><a href="{{{ action('ClientsController@show', $client->id) }}}">{{{$client->client_name}}}</a></td>
                             <td><a href="mailto:{{{$client->main_poc_email}}}"></a>{{{$client->main_poc_email}}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
        
              
    </div> <!-- closes container -->
    <div class="container">
        <ul class="pagination center-align">
            {{ $paginator->render() }}
        </ul>    
    </div>  
</main>
@stop
