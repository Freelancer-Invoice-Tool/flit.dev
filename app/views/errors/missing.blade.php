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
                @if(Auth::check())
                    <a href="{{{action('HomeController@showDashboard')}}}">Return to Dashboard</a>
                @else
                    <a href="{{{action('HomeController@showHome')}}}">Please Log In First</a>
                @endif
            </div>
        </div>
    </div>
</main>
@stop