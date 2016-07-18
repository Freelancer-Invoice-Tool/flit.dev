<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,400italic,700' rel='stylesheet' type='text/css'>

    <!-- Compiled and minified materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!-- materialize icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--DataTables css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/cr-1.3.2/r-2.1.0/rr-1.1.2/datatables.min.css"/>

    <!-- our css -->
    <link rel="stylesheet" type="text/css" href="/css/master.css">
          
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                @if (!Auth::check()) 
                    <a href="{{{action('HomeController@showHome')}}}" class="brand-logo hide-on-med-and-down"><img class="compLogo responsive-img" src="/../../img/compLogo.png"></a>

                    <a href="{{{action('HomeController@showHome')}}}" class="brand-logo hide-on-large-only"><img class="responsive-img" src="/../../img/compLogo.png"></a>
                @else
                    <a href="{{{action('HomeController@showDashboard')}}}" class="brand-logo hide-on-med-and-down"><img class="compLogo responsive-img" src="/../../img/compLogo.png"></a>

                    <a href="{{{action('HomeController@showDashboard')}}}" class="brand-logo hide-on-large-only"><img class="responsive-img" src="/../../img/compLogo.png"></a>
                @endif

                @if (Auth::check())
                    <a href="#" data-activates="mobile-view" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="{{{action('HomeController@showDashboard')}}}">Dashboard</a></li>
                        <li><a href="{{{action('ProjectsController@index')}}}">Projects</a></li>
                        <li><a href="{{{action('ClientsController@index')}}}">Clients</a></li>
                        <li><a href="{{action('UserController@edit', Auth::user()->id)}}">Account</a></li>
                        <li><a href="{{{action('UserController@logout')}}}">Log Out</a></li>
                    </ul>

                    <!-- for mobile view side-navbar -->
                    <ul class="side-nav" id="mobile-view">
                        <li><a href="{{{action('HomeController@showDashboard')}}}">Dashboard</a></li>
                        <li><a href="{{{action('ProjectsController@index')}}}">Projects</a></li>
                        <li><a href="{{{action('ClientsController@index')}}}">Clients</a></li>
                        <li><a href="{{action('UserController@edit', Auth::user()->id)}}">Account</a></li>
                        <li><a href="{{{action('UserController@logout')}}}">Log Out</a></li>
                    </ul>
                @endif
            </div>
        </nav>
    </header>

    @if (Session::has('successMessage'))
        <div class="alert alert-success center-align">{{{ Session::get('successMessage') }}}</div>
    @endif

    @if (Session::has('errorMessage'))
        <div class="alert alert-danger center-align">{{{ Session::get('errorMessage') }}}</div>
    @endif

    @yield('content')

    <footer>
        <div class="row">
            <div class="col s10">
                <p> 
                    <span class="hide-on-med-and-down">
                    <a href="http://kristenlcates.com/" target="_blank">&#169; 2016  |  Kristen Cates</a> 
                    <a href="https://www.linkedin.com/in/alan-lauritzen-02a078104" target="_blank">  |  Alan Lauritzen</a>
                    <a href="http://bobbieoconnor.me/" target="_blank">  |  Bobbie O'Connor</a>
                    </span>
                </p>
            </div>
        </div>
    </footer>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

<!--DataTables js-->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/cr-1.3.2/r-2.1.0/rr-1.1.2/datatables.min.js"></script>

<!-- our JS -->
<script src="/js/home.js"></script>

<!-- Yields Page-Specific JS or jQuery -->
@yield('bottom-script')
</body>
</html>