@extends('layouts.master')

@section('title')
    Flit: {{$client->client_name}}
@stop

@section('content')
<main>
    <div class="container">
        <h1 class="center-align">{{{ $client->client_name }}}</h1> 

        <div class="section">
            <h3>Main Point of Contact</h3>

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
                <button class="btn edit-btn"><a href="{{{ action('ClientsController@edit', $client->id) }}}">Edit This Client</a></button>
            @endif    
        </div>

        <div class="section">
            <h3>Projects</h3>
            <table>
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th class="hide-on-med-and-down">Project Description</th>
                        <th class="hide-on-med-and-down">Project Status</th>
                        <th>Project Due Date</th>
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