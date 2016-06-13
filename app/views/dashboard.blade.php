@extends('layouts.master')

@section('title')
    Flit: My Projects
@stop

@section('content')
<main>
    <div class="container">

        <div class="row">
            <div class="col s6">
                <!-- Dropdown Triggers -->
                <a class='dropdown-button btn' href='#' data-activates='dropClients'>Contacts</a>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <a class='dropdown-button btn' href='#' data-activates='dropDates'>Deadlines</a>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <a class='dropdown-button btn' href='#' data-activates='dropPay'>Pay Days</a>
            </div>
        </div>

        <!-- Dropdown Structures -->
        <ul id='dropClients' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li><a href="#!">three</a></li>
        </ul>

        <ul id='dropDates' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li><a href="#!">three</a></li>
        </ul>

        <ul id='dropPay' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li><a href="#!">three</a></li>
        </ul>
    </div>
</main>
@stop