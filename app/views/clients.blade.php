@extends('layouts.master')

@section('title')
    Flit: My Clients
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>All Clients</h1>
        </div>

    <!--foreach loop here to propagate data, will also need paginate/row thing prob  -->
        <div class="row">
            <div class="col s3">
                <a href="#">Client Name Here</a>
                <p>Contact Info</p>
                <p>Project Name</p>
                <p>Project Details</p>
            </div> 
        </div> <!-- closes row -->  
    </div> <!-- closes container -->
       

</main>
@stop
