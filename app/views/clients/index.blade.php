@extends('layouts.master')

@section('title')
    FLIT: My Clients
@stop

@section('content')
<main>
    <div class="container">
        <div class="section">
            <div>
                <h2 class="hide-on-med-and-down">All Clients</h2>
                <h3 class="hide-on-large-only">All Clients</h3>
            </div>
            <div class="right-align btn-margin">
                <a class="waves-effect waves-light btn edit-btn" href="{{{action('ClientsController@create')}}}">Create New Client</a>
            </div>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="section">
            <div class="hide-on-med-and-down">
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th class="center-align">Name</th>
                            <th class="center-align">Main Contact</th>
                            <th class="center-align">Contact Phone</th>
                            <th class="center-align">Contact Email</th>
                            <th class="center-align">Contact Address</th>
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
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div class="section">
            <div id="mobile-project-index" class="hide-on-large-only">
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th class="center-align">Name</th>
                            <th class="center-align">Main POC Email</th>
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
        </div>  
               
        <div class="section">
            <ul class="pagination center-align">
                {{ $paginator->render() }}
            </ul>    
        </div>  
    </div> <!-- closes container -->
</main>
@stop
