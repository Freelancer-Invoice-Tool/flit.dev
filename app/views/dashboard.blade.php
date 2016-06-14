@extends('layouts.master')

@section('title')
    Flit: Dashboard
@stop

@section('content')
<main>
    <div class="container">
        <div>
            <div class="row">
                <h1>UserNameHere's To-Do</h1>
            </div>

            <div class="row">
                <div class="col s6 col offset-s6 right-align">
                    <a class='dropdown-button btn' href='#'>Create New Project</a>
                </div>
            </div>

            <!-- Dropdown Triggers -->
            <div class="row">
                <div class="col s6 offset-s6 right-align">
                    <a class='dropdown-button btn' href='#' data-activates='dropDueDates'>All Due Dates</a>
                </div>
            </div>
            <div class="row">
                <div class="col s6 offset-s6 right-align">
                    <a class='dropdown-button btn' href='#' data-activates='dropPay'>All Pay Days</a>
                </div>
            </div>

            <!-- Dropdown Structures -->
            <ul id='dropDueDates' class='dropdown-content'>
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

        <div>
            <table class="striped centered responsive-table">
            <h4>Upcoming This Month</h4>
                <thead>
                    <tr>
                        <th data-field="project">Project</th>
                        <th data-field="dueDates">Due Date</th>
                        <th data-field="details" class="truncate">Details</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><a href="#"></a>Project</td>
                        <td>March</td>
                        <td>Blahblahblahblahblahblahblah</td>
                    </tr>
                </tbody>
          </table>
        </div>
    </div>
</main>
@stop