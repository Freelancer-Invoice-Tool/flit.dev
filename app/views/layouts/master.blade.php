<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Compiled and minified materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!-- materialize icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- our css -->
    <link rel="stylesheet" type="text/css" href="/css/master.css">
          
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="{{{action('HomeController@showHome')}}}" class="brand-logo">Logo</a>
                <a href="#" data-activates="mobile-view" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="{{{action('HomeController@showClients')}}}">Clients</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>

                <!-- for mobile view side-navbar -->
                <ul class="side-nav" id="mobile-view">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="{{{action('HomeController@showClients')}}}">Clients</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div>
        </nav>


    </header>

    @yield('content')



    <footer>
        <div>
            <p>&#169; 2016</p>
        </div>
    </footer>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

<!-- our JS -->
<script src="/js/home.js"></script>
</body>
</html>