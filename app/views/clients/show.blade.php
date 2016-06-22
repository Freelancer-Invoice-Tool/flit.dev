@extends('layouts.master')

@section('title')
    FLIT: {{$client->client_name}}
@stop

@section('content')
<main>
    <div class="container">
        <div class="row">
            <h2 class="center-align hide-on-med-and-down">{{{ $client->client_name }}}</h2>
            <h3 class="center-align hide-on-large-only">{{{ $client->client_name }}}</h3>
        </div>

        <div class="section">
            <h3 class="center-align hide-on-med-and-down">Main Point of Contact</h3>
            <h4 class="center-align hide-on-large-only">Main Point of Contact</h4>

            <!-- Top portion -->
            <table class="centered">
                <thead>
                    <tr>
                        <th>Main POC Name</th>
                        <th class="hide-on-med-and-down">Payment Terms</th>
                        <th>Main POC Email</th>
                        <th class="hide-on-med-and-down">Main POC Phone</th>
                        <th class="hide-on-med-and-down">Main POC Address</th>
                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td>{{{ $client->main_poc_name }}}</td>
                        <td class="hide-on-med-and-down">{{{$client->payment_terms}}} days after invoice {{{$client->submission_or_approval}}}</td>
                        <td><a href="mailto:{{{$client->main_poc_email}}}">{{{$client->main_poc_email}}} </td>
                        <td class="hide-on-med-and-down">{{{$client->main_poc_phone}}}</td>
                        <td class="hide-on-med-and-down">{{{$client->main_poc_address}}}</td>
                    </tr>
                </tbody>   
            </table>

            @if(Auth::check())
            <div class="row hide-on-med-and-down">
                <button class="btn edit-btn"><a href="{{{ action('ClientsController@edit', $client->id) }}}">Edit This Client</a></button>
            </div>
            <div class="row hide-on-large-only center-align">
                <button class="btn edit-btn"><a href="{{{ action('ClientsController@edit', $client->id) }}}">Edit Client</a></button>
            </div>   
            @endif 
        </div>

        <!-- bottom portion: list of projects -->
        <div class="section">
            <h3 class="center-align hide-on-med-and-down">Projects</h3>
            <h4 class="center-align hide-on-large-only">Projects</h4>
            <table class="centered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="hide-on-med-and-down">Description</th>
                        <th class="hide-on-med-and-down">Status</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></td>  
                            <td class="hide-on-med-and-down">{{{$project->description}}}</td>
                            <td class="hide-on-med-and-down">{{{$project->project_status}}}</td>
                            <td>{{{((strpos($project->due_date, '-0001'))===false && !empty($project->due_date)) ? $project->due_date->format('m-d-Y') : ''}}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>
    </div>
</main>
@stop