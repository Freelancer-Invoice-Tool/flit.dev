@extends('layouts.master')

@section('title')
    Flit: My Projects
@stop

@section('content')
<main>

    <div class="container">
        <div>
            <h1>All Projects</h1>
        </div>

    <!--foreach loop here to propagate data, will also need paginate/row thing prob  -->
        <div class="row">
            <div class="col s3">
                <a href="#">Project Name Here</a>
                <p>Due Date</p>
                <p>Expected Pay Date</p>
                <p>Project Contact</p>
                <p>Project Details</p>
            </div> 
        </div> <!-- closes row -->  
    </div> <!-- closes container -->
       
</main>
@stop
