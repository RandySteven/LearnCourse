<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="120">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #hov-nav:hover{
            background-color: white;
            color: black;
        }
    </style>
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Learn Course
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" >
                        <li class="nav-item mx-2" id="hov-nav"><a href="{{ route('post.index') }}">All Posts</a></li>
                        <li class="nav-item mx-2" id="hov-nav"><a href="{{ route('forum.index') }}">Forums</a></li>
                        <li class="nav-item mx-2" id="hov-nav"><a href="{{ route('courses.index') }}">Course</a></li>
                        <li class="nav-item mx-2" id="hov-nav"><a href="{{ route('learn-code') }}">Learn Code</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
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

        <div class="container">
            <main class="py-4">
                Current Time : <span id="txt"></span>
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="">
        <div class="container text-center" style="background-color: lightgrey">
            &copy; Randy Steven 2020
            <p>
                Menyediakan tentang tutorial koding dan forum untuk para programmer agar bisa sharing khususnya di Web Development.
                <br>
                Luaskan ilmu yang bermanfaat.
            </p>
            <p>
                <a href="https://www.facebook.com/"><img src="{{ asset('images/facebook.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="https://github.com/"><img src="{{ asset('images/github.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="https://www.instagram.com/"><img src="{{ asset('images/logo.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="https://www.youtube.com/"><img src="{{ asset('images/youtube.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
                <a href="#"><img src="{{ asset('images/twitter.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
            </p>
            <p>
                Programmer membuat sesuatu dengan penuh cinta.
            </p>
            <div class="m-2">
                <button class="btn btn-outline-secondary" onclick="darkmode()">Darkmode</button>
            </div>
        </div>
    </footer>

    <script>
        function darkmode(){
            var card = document.getElementsByClassName("container");
            card.classList.toggle("darkmode");
        }
        window.onload=function(){
            getTime();
        }
        function getTime(){
            var today = new Date();
            var day = today.getTime();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();

            m=checkTime(m);
            s=checkTime(s);

            document.getElementById('txt').innerHTML =h + ":" + m + ":" + s
            setTimeout(function(){
                getTime()
            }, 1000);
        }
        function checkTime(i){
            if(i<10){
                i = "0" + i;
            }
            return i;
        }
    </script>
</body>
</html>
