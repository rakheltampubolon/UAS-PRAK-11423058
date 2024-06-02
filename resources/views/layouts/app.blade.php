<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        @if (Auth::user()->role_id == 1)
                        <li><a class="nav-link" href="{{ route('users.index') }}">Data User</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Data Role</a></li>
                        <li><a class="nav-link" href="{{ route('lapangans.index') }}">Data Lapangan</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Laporan <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('laporan-mingguan.index') }}">
                                    Mingguan
                                </a>
                                <a class="dropdown-item" href="{{ route('laporan-bulanan.index') }}">
                                    Bulanan
                                </a>
                                <a class="dropdown-item" href="{{ route('laporan-tahunan.index') }}">
                                    Tahunan
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <img alt="Image" size="30" height="30" width="30"
                                    class="avatar avatar-sm rounded-circle" src="{{ asset('img/icon/user.png') }}">
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <span class="dropdown-item mb-0 text-sm font-weight-bold font-italic">
                                    @if (!empty(Auth::user()->name))
                                    Welcome, {{ ucwords(Auth::user()->name) }}
                                    @else
                                    Welcome, {{ ucwords(Auth::user()->email) }}
                                    @endif
                                </span>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @elseif(Auth::user()->role_id == 2)
                        <li><a class="nav-link" href="{{ route('bookings.index') }}">Data Booking</a></li>
                        <li><a class="nav-link" href="{{ route('members.index') }}">Data Member</a></li>
                        <li><a class="nav-link" href="{{ route('lapangans.index') }}">Data Lapangan</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Laporan <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('laporan-mingguan.index') }}">
                                    Mingguan
                                </a>
                                <a class="dropdown-item" href="{{ route('laporan-bulanan.index') }}">
                                    Bulanan
                                </a>
                                <a class="dropdown-item" href="{{ route('laporan-tahunan.index') }}">
                                    Tahunan
                                </a>
                            </div>
                        </li> &nbsp;
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <img alt="Image" size="30" height="30" width="30"
                                    class="avatar avatar-sm rounded-circle" src="{{ asset('img/icon/user.png') }}">
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <span class="dropdown-item mb-0 text-sm font-weight-bold font-italic">
                                    @if (!empty(Auth::user()->name))
                                    Welcome, {{ ucwords(Auth::user()->name) }}
                                    @else
                                    Welcome, {{ ucwords(Auth::user()->email) }}
                                    @endif
                                </span>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <li><a class="nav-link" href="{{ route('bookings.index') }}">Data Booking</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <img alt="Image" size="30" height="30" width="30"
                                    class="avatar avatar-sm rounded-circle" src="{{ asset('img/icon/user.png') }}">
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <span class="dropdown-item mb-0 text-sm font-weight-bold font-italic">
                                    @if (!empty(Auth::user()->name))
                                    Welcome, {{ ucwords(Auth::user()->name) }}
                                    @else
                                    Welcome, {{ ucwords(Auth::user()->email) }}
                                    @endif
                                </span>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
