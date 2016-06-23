@extends('layouts.email')

@section('content')

    <h2>Welcome to FLIT, Your Personal Assistant!</h2>

    <p>
        Dear {{{$user['first_name']}}},<br>
        We hope you enjoy the ability to easily track your projects with FLIT. Click the button below to login to your account.<br>
        Sincerely,<br>
        Alan, Bobbie, and Kristen
    </p>
    <a class="waves-effect waves-light btn edit-btn" href="{{{action('HomeController@showHome')}}}">Login to Your Account</a>
@stop