@extends('layouts.master')

@section('title')
    Flit: {{$client->client_name}}
@stop

@section('content')
<main>
    <div class="container">
        <h1 class="center-align">{{{ $client->client_name }}}</h1> 

        <h3>Main Point of Contact</h3>
        <h4> This client will pay me {{{$client->payment_terms}}} days after invoice {{{$client->submission_or_approval}}}</h4>
        <p>{{{ $client->main_poc_name }}}</p>
        <p> {{{$client->main_poc_email}}} </p>
        <p> {{{$client->main_poc_phone}}} </p>
        <p> {{{$client->main_poc_address}}} </p>

        @if(Auth::check())
            <button class="btn edit-btn"><a href="{{{ action('ClientsController@edit', $client->id) }}}">Edit This Client</a></button>
        @endif
    </div>
</main>
@stop