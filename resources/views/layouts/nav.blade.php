<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('app.name', 'Binx') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/a536d1a554.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Side background -->

    <div class="wrapper-wide">
        <div class="side-col side-bg"></div>
        <div class="side-col side-bg-cover"></div>
    </div>

    <div class="wrapper">

        <nav>
            <ul class="nav">
                <li><a class="logo" href="{{ url('/home') }}"><h1>Binx</h1></a></li>
            </ul>

            <ul class="nav">

                @guest
                        <a href="#" class="nav-link shop"><i class="far fa-shopping-bag"></i></a>
                    @if (Route::has('login'))
                        <a class="nav-link dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-link light" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    @if (auth()->user()->is_admin == 1)
                    <a class="nav-link dark live" href="{{ url('/home') }}">Live View</a>
                    <a class="nav-link icon configure" href="{{ url('/admin/home') }}"><i class="fas fa-cog"></i></a>
                    <a class="nav-link icon configure" href="{{ route('products.create') }}"><i class="fas fa-folder-plus"></i></a>
                    @else
                    <a href="#" class="nav-link shop"><i class="far fa-shopping-bag"></i></a>
                    @endif

                    <a class="nav-link icon" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="far fa-sign-out-alt"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>

    </div>

    @yield('content')

</body>
</html>
