@extends('layouts.master')

@section('title')
    FLIT: Edit Client
@stop

@section('content')
<main>
    <div class="container">
        <div class="section row">
            <div>
                <h2 class="hide-on-med-and-down">Edit Client Info</h2>
                <h3 class="hide-on-large-only">Edit Client Info</h3>
            </div>
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="col s10 hide-on-med-and-down">
            {{Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT'))}} 

            <div class="row">
                <div class="input-field col s12">
                    {{Form::label('client_name', 'Client Name')}} 
                    {{Form::text('client_name', Input::old('title'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. ABC Company, Inc.', 'value' => $client->client_name))}} 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    {{Form::label('payment_terms', 'Payment Terms (in number of days)')}} 
                    {{Form::number('payment_terms', Input::old('payment_terms'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 30', 'value' => $client->payment_terms))}}
                </div> 
            
                <div class="input-field col s6">
                    {{Form::label('submission_or_approval', 'Does Payment Term start on invoice approval or invoice submission?')}} 
                    {{Form::text('submission_or_approval', Input::old('submission_or_approval'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. submission', 'value' => $client->submission_or_approval))}} 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    {{Form::label('main_poc_name', 'Main Point of Contact Name')}}
                    {{Form::text('main_poc_name', Input::old('main_poc_name'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. Joe Blow', 'value' => $client->main_poc_name))}}
                </div>
                
                <div class="input-field col s6">
                    {{Form::label('main_poc_email', 'Main Point of Contact Email')}}
                    {{Form::text('main_poc_email', Input::old('main_poc_email'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. jblow@example.com', 'value' => $client->main_poc_email))}}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    {{Form::label('main_poc_phone', 'Main Point of Contact Phone')}}
                    {{Form::text('main_poc_phone', Input::old('main_poc_phone'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 210-867-5309', 'value' => $client->main_poc_phone))}}
                </div>
            
                <div class="input-field col s6">
                    {{Form::label('main_poc_address', 'Main Point of Contact Address')}}
                    {{Form::text('main_poc_address', Input::old('main_poc_address'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 123 Some Street Anytown, TX 78253', 'value' => $client->main_poc_address))}}
                </div>
            </div>

            <div class="row center-align">
                <div class="col s6">
                    <button type="submit" class="btn edit-btn">Submit Client</button>
                </div>

                <!-- Modal Trigger -->
                <div class="col s6"> 
                    <button data-target="modal1" class="btn modal-trigger delete-btn">Delete Client</button>
                </div>
            </div>

        {{Form::close()}}
        </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <form method="POST" action="{{{action('ClientsController@destroy', $client->id)}}}">
            {{Form::token()}}
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-content row">
                    <h4>Are You Sure?</h4>
                    <p>If you delete this client, you won't be able to retrieve it!</p>
                </div>
                <div class="modal-footer row">
                    <div class="col s3 center-align">
                        <button class="btn edit-btn"><a href="{{{ action('ClientsController@show', $client->id) }}}" class=" modal-action modal-close">Keep</a></button>
                    </div>

                    <div class="col s3 center-align">
                        <button type="submit" class="btn delete-btn">Delete</button>
                    </div>
                </div>
            </form>   
        </div> 

    <!-- condensed index visible on vertical tablet and smaller -->
        <div id="mobile-project-index" class="hide-on-large-only">
            {{Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT'))}} 

            <div class="row">
                <div class="input-field col s10">
                    {{Form::label('client_name', 'Client Name')}} 
                    {{Form::text('client_name', Input::old('title'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. ABC Company, Inc.', 'value' => $client->client_name))}} 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s10">
                    {{Form::label('payment_terms', 'Payment Terms (in number of days)')}} 
                    {{Form::number('payment_terms', Input::old('payment_terms'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 30', 'value' => $client->payment_terms))}}
                </div>
            </div> 
            
            <div class="row">
                <div class="input-field col s10">
                    {{Form::label('submission_or_approval', 'Does Payment Term start on invoice approval or invoice submission?')}} 
                    {{Form::text('submission_or_approval', Input::old('submission_or_approval'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. submission', 'value' => $client->submission_or_approval))}} 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s10">
                    {{Form::label('main_poc_name', 'Main Point of Contact Name')}}
                    {{Form::text('main_poc_name', Input::old('main_poc_name'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. Joe Blow', 'value' => $client->main_poc_name))}}
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s10">
                    {{Form::label('main_poc_email', 'Main Point of Contact Email')}}
                    {{Form::text('main_poc_email', Input::old('main_poc_email'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. jblow@example.com', 'value' => $client->main_poc_email))}}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s10">
                    {{Form::label('main_poc_phone', 'Main Point of Contact Phone')}}
                    {{Form::text('main_poc_phone', Input::old('main_poc_phone'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 210-867-5309', 'value' => $client->main_poc_phone))}}
                </div>
            </div>
            
            <div class="row"> 
                <div class="input-field col s10">
                    {{Form::label('main_poc_address', 'Main Point of Contact Address')}}
                    {{Form::text('main_poc_address', Input::old('main_poc_address'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 123 Some Street Anytown, TX 78253', 'value' => $client->main_poc_address))}}
                </div>
            </div>

            <div class="row center-align">
                <div class="col s10">
                    <button type="submit" class="btn edit-btn">Submit Client</button>
                </div>
            </div>

                <!-- Modal Trigger -->
            <div class="row center-align">
                <div class="col s10"> 
                    <button data-target="modal1" class="btn modal-trigger delete-btn">Delete Client</button>
                </div>
            </div>

        {{Form::close()}}
        </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal mobile-modal">
            <form method="POST" action="{{{action('ClientsController@destroy', $client->id)}}}">
            {{Form::token()}}
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-content row">
                    <h4>Are You Sure?</h4>
                    <p>If you delete this client, you won't be able to retrieve it!</p>
                </div>
                <div class="modal-footer row">
                    <div class="col s12">
                        <button class="btn edit-btn"><a href="{{{ action('ClientsController@show', $client->id) }}}" class=" modal-action modal-close">Keep</a></button>
                    </div>
                </div>
                <div class="modal-footer row">
                    <div class="col s12">
                        <button type="submit" class="btn delete-btn">Delete</button>
                    </div>
                </div>
            </form>   
        </div> 
    </div>
</main> 
@stop
@section('bottom-script')
    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
          });
    </script>
@stop