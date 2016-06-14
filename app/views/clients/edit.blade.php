@extends('layouts.master')

@section('title')
    Flit: Edit Client
@stop

@section('content')
     <div class="container row">
        <h1>Edit Client Info</h1>  

        {{Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT'))}} 
            <div>
                {{Form::label('client_name', 'Client Name')}} 
                {{Form::text('client_name', Input::old('title'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. ABC Company, Inc.', 'value' => $client->client_name))}} 
            </div>
            <div>
                {{Form::label('main_poc_name', 'Main Point of Contact Name')}}
                {{Form::text('main_poc_name', Input::old('main_poc_name'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. Joe Blow', 'value' => $client->main_poc_name))}}
            </div>
            <div>
                {{Form::label('main_poc_email', 'Main Point of Contact Email')}}
                {{Form::text('main_poc_email', Input::old('main_poc_email'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. jblow@example.com', 'value' => $client->main_poc_email))}}
            </div>
            <div>
                {{Form::label('main_poc_phone', 'Main Point of Contact Phone')}}
                {{Form::text('main_poc_phone', Input::old('main_poc_phone'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 210-867-5309', 'value' => $client->main_poc_phone))}}
            </div>
            <div>
                {{Form::label('main_poc_address', 'Main Point of Contact Address')}}
                {{Form::text('main_poc_address', Input::old('main_poc_address'), array('class' => 'form-control other-class another', 'placeholder' => 'e.g. 123 Some Street Anytown, TX 78253', 'value' => $client->main_poc_address))}}
            </div>
            <div>
                <button type="submit" class="btn">Submit Client</button> 
                <!-- Modal Trigger -->
                <button data-target="modal1" class="btn modal-trigger">Delete Client</button>
            </div>
        {{Form::close()}}
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <form method="POST" action="{{{action('ClientsController@destroy', $client->id)}}}">
        {{Form::token()}}
            <input type="hidden" name="_method" value="DELETE">
            <div class="modal-content">
                <h4>Are You Sure?</h4>
                <p>If you delete this client, you won't be able to retrieve it!</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn">Delete</button>
                <button class="btn"><a href="{{{ action('ClientsController@show', $client->id) }}}" class=" modal-action modal-close">Keep</a></button>
            </div>
        </form>
        
    </div>  

@stop
@section('bottom-script')
    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
          });
    </script>
@stop