@extends('layouts.master')

@section('title')
    Ooops!
@stop

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col s12 center-align">
                <h1>Something go wrong?</h1>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
                <img src="/../../img/mistake.jpg">
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
                <a href="{{{action('HomeController@showDashboard')}}}">Return to Dashboard</a>
            </div>
        </div>
    </div>
</main>
@stop