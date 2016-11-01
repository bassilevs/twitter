<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Twitter') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app" style="background-color: #f5f5f5">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div id="tweet_img">
                <a href="/">
                    <img src="../images/bird.png">
                </a>
            </div>
            <div class="container">
                <div class="navbar-right">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>



                <ul class="nav nav-pills navbar-left" role="tablist">
                    <li class="active" href="{{url('/')}}">
                        <div class="default-buttons">
                            <button type="submit" class="btn btn-default navbar-btn">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                Home</button>
                        </div>
                    </li>
                    <li class="active" href="#">
                        <div class="default-buttons">
                            <button type="button" class="btn btn-default navbar-btn">
                                <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                                Notifications</button>
                        </div>
                    </li>

                    <li class="active" href="#">
                        <div class="default-buttons">
                            <button type="button" class="btn btn-default navbar-btn">
                                <img src="../images/icon-hashtag.png">
                                Discover</button>
                        </div>
                    </li>

                    <li class="active" href="#">
                        <div class="default-buttons">
                            <button type="button" class="btn btn-default navbar-btn">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Me</button>
                        </div>
                    </li>
                </ul>


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else

                            <li>
                                <form method="get" action="{{ url('/users/search') }}" class="navbar-form navbar-right" role="search">
                                    <div class="input-group">
                                        <input class="form-control search-form" id="search_field" placeholder="Search Twitter" name="term" value="">
                                        <span class="input-group-btn">

                                            <button type="submit" class="form-control btn btn-default search-btn">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/home.js"></script>
</body>
</html>
