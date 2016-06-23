@extends('layouts.master')

@section('title')
    FLIT Home Login
@stop

@section('content')

<main>

    <?php require_once('../config.php'); ?>

    <div class="container">
        <div class="section row">
            <div class="col s6">
                <h2 class="hide-on-med-and-down">Sign Up</h2>
                <h3 class="hide-on-large-only">Sign Up</h3>
                <p>Enjoy all the benefits of FLIT for a one-time fee of $4.99!</p>
            </div>
        </div>

        <div class="section">

        {{ Form::open(array('action'=>'UserController@store', 'id'=>"signup_form")) }}
                      
            <div class="row">
                <div class="input-field col s6">
                    {{Form::text('first_name', null, array('class'=>'validate'))}}
                    {{ Form::label('first_name', 'First Name') }}
                </div>
                <div class="input-field col s6">
                    {{ Form::text('last_name', null, array('class'=>'validate')) }}
                    {{ Form::label('last_name', 'Last Name') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::email('email', null, array('class'=>'validate')) }}
                    {{ Form::label('email', 'Email') }}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::password('password', null, array('class'=>'validate')) }}
                    {{ Form::label('password', 'Password') }}
                </div>
            </div>

            <!-- expanded index visible on horizontal tablet and larger -->
            <div class="row hide-on-med-and-down">
                <div class="col s6 hide-on-med-and-down">
                    <button type="submit" class="btn waves-effect waves-light edit-btn no-wrap" id="create_account">Create Account</button>
                </div>
                
                <div class="col s6 hide-on-med-and-down">
                    <p>Already have an account?</p>
                    <a class="no-wrap" href="{{{action('HomeController@showHome')}}}">Log In</a>
                </div>
            </div>

            <!-- condensed index visible on vertical tablet and smaller -->
            <div class="row hide-on-large-only">
                <div class="col s12 hide-on-large-only center-align">
                    <button type="submit" class="btn waves-effect waves-light edit-btn no-wrap">Create Account</button>
                </div>

                <div class="mobile-login row hide-on-large-only">
                    <div class="col s12">
                        <p class="center-align">Already have an account?</p>
                    </div>
                </div>

                <div class="row hide-on-large-only">
                    <div class="col s12 center-align">
                        <a class="no-wrap" href="{{{action('HomeController@showHome')}}}">Log In</a>
                    </div>
                </div>
            </div>
                    
        {{ Form::close() }}
        </div>
    </div>
</main>
@stop

@section('bottom-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        var handler = StripeCheckout.configure({
            key: 'pk_test_NZaksNaAciYW6RnKHIJNGJ3w',
            image: '/img/compLogo.png',
            locale: 'auto',
            token: function(token) {
              // You can access the token ID with `token.id`.
              // Get the token ID to your server-side code for use.
            },
            closed: function() {
                $('#signup_form').submit();
                console.log("it ran");
            }
        });

        $('#create_account').on('click', function(e) {
            // Open Checkout with further options:
            handler.open({
                name: 'Flit',
                description: 'Freelance Invoicing Tool',
                amount: 499,
                // address:true,
                allowRememberMe: false
            });
            e.preventDefault();
        });

        // Close Checkout on page navigation:
        $(window).on('popstate', function() {
            handler.close();

        });
    </script>
@stop
