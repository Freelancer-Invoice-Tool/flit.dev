@extends('layouts.master')

@section('title')
    Flit: My Clients
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>All Clients</h1>
        </div>

    <!--foreach loop here to propagate data, will also need paginate/row thing prob  -->
        @foreach($clients as $client)
                <div class="row">
                    <div class="col s3">
                        <h3><a href="{{{ action('ClientsController@show', $client->id) }}}">Client: {{{$client->client_name}}}</a></h3>
                        <p>Main Contact: {{{$client->main_poc_name}}}</p>
                        <p>Main Contact Phone: {{{$client->main_poc_phone}}}</p>
                        <p>Main Contact Email: {{{$client->main_poc_email}}}</p>
                        <p>Main Contact Address: {{{$client->main_poc_address}}}</p> 
                    </div> 
                </div> <!-- closes row -->
        @endforeach
    </div> <!-- closes container -->
       
</main>
@stop