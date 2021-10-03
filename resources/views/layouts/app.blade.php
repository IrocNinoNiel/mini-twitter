<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @guest

        @else
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <h3><a href="{{ route('home')}}" class="navbar-brand"><img src="{{ asset('img/appname.png') }}" width="200" height="50" alt=""></a></h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> --}}
                </div>
            </div>
        </nav>
        @endguest
        <div class="row">
            @guest
            <div class="col"></div>
            @else   
            <div class="col">
                <div class="col-md-8">
                    <div class="row mt-5">
                        <div class="container text-left">
                            <a href="" class="font-weight-bold btn"><p class="h4">Home</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-left">
                            <a href="" class="font-weight-bold btn"><p class="h4">Explore</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-left">
                            <a href="" class="font-weight-bold btn"><p class="h4">Notifications</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-left">
                            <a href="" class="font-weight-bold btn"><p class="h4">Bookmarks</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-left">
                            <a href="" class="font-weight-bold btn"><p class="h4">Messages</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-left">
                            <a href="" class="font-weight-bold btn"><p class="h4">List</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-left">
                            <a href="" class="font-weight-bold btn"><p class="h4">Profile</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-left">
                            <a class="font-weight-bold btn" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <p class="h4">Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            {{-- <a href="" class="font-weight-bold btn"><p class="h4">Logout</p></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endguest
            <div class="col-8">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
            <div class="col">
            </div>
        </div>
    </div>
</body>
</html>
