<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Buzzer') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/websocket.js') }}" defer></script>
    <script src="{{ asset('js/menuScript.js') }}" defer></script>
    <script src="{{ asset('js/infiniteScroll.js') }}" defer></script>
    <script src="{{ asset('js/searchfor_article.js') }}" defer></script>
    <script src="{{ asset('js/effects.js') }}" defer></script>
    <script src="lib/jscroll/dist/jquery.jscroll.min.js" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu_styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/articleView.css') }}" rel="stylesheet">
    <link href="{{ asset('css/effects.css') }}" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <form method="GET" action="{{ url('/fetchArticle') }}">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" id="logo" href="{{ url('/mainpage') }}">
                        Buzzer
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        
                        <div class="row search-container">
                        <div class="col-md-10 col-sm-4">
                            <input type="text" width="100%" required id="search-text" name="search-text" class="search-text" placeholder="Search for news">
                        </div>
                        <div class="col-md-2 col-sm-1">
                            <button type="submit" class="btn btn-default" >Search</button>
                        </div>
                        </div>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <!-- <li class="nav-item">
                                    <a class="nav-link sign_in_header" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link sign_in_header" href="{{ route('register') }}">{{ __('Create account') }}</a>
                                    </li>
                                @endif -->
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </form>
        @if(Auth::check())
        <div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
         <center>You have <strong>successfully</strong> logged in</center>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        // window.setTimeout(function(){
        //     document.getElementsByClassName('alert')[0].style.display='none';
        // },4000);
        // setInterval(function(){
        //     document.getElementById('banner').style.display='block';
        // },100);
       // $(document).ready(function() 
       // {
       //      $("#banner").hide();
       //      $(".close").click(function showAlert() 
       //      {
       //          $("#banner").fadeTo(2000, 500).slideUp(500, function() 
       //          {
       //              $("#banner").slideUp(500);
       //          });
       //      });
       //  });

       document.addEventListener('load',function(){
            alert('Hello');
       });
    </script>
</body>
</html>
