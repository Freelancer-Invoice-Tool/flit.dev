@extends('layouts.master')

@section('title')
    Flit Home Login
@stop

@section('content')

<main>

    <div class="container">
        <div class="row">
            <div class="col s8">
                <h1>Signup for Flit</h1>
            </div>
        </div>

        <div class="col s6">
             <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop

