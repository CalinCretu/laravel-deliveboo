<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://kit.fontawesome.com/531bff1fdd.js" crossorigin="anonymous"></script>
    
    {{-- Chart link --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header>
            <div class="container">
            <nav class="my-navbar">
                <div class="logo">
                    @if(Auth::user())
                    <a class="" href="{{route('dashboard', Auth::user()->slug)}}">
                        <img class="d-none d-sm-none d-md-block d-lg-block d-xl-block " width="20%" class="item-img" src="{{Vite::asset('resources/img/Logo 3.png')}}" alt="">
                           {{-- config('app.name', 'Laravel') --}}
                        <img class="d-block d-md-none" width="15%" class="item-img" src="{{Vite::asset('resources/img/Logo 1.png')}}" alt="">
                    </a>
                    @else
                        <img class="d-none d-sm-none d-md-block d-lg-block d-xl-block " width="20%" class="item-img" src="{{Vite::asset('resources/img/Logo 3.png')}}" alt="">
                           {{-- config('app.name', 'Laravel') --}}
                        <img class="d-block d-md-none" width="15%" class="item-img" src="{{Vite::asset('resources/img/Logo 1.png')}}" alt="">
                    @endif
                </div>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="my-nav-list">
                            <!-- Authentication Links -->
                            @guest

                            <li class="nav-item ">
                                <a class="nav-link col-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link col-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @yield('dashboard')
                                    {{-- <a class="dropdown-item" href="{{route('dashboard', $user->slug)}}">{{__('Dashboard')}}</a> --}}
                                    {{-- <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    {{-- </div> --}}
                </nav>
            </div>
        </header>
                
        <div class="app-body container">
            @if(Auth::user())
                <aside class=" my-5 sidebar">
                    @include('admin.partials.sidebar')
                </aside>
            @endif
            <main class="flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
