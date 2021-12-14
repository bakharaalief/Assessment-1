<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Appointment</title>

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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistem Appointment
                </a>
                @else

                <a  class="navbar-brand" 

                    @if (Auth::user()->level == 'dosen')
                    href="{{ url('/dosen') }}"
                    @elseif (Auth::user()->level == 'mahasiswa')
                    href="{{ url('/mahasiswa') }}"
                    @else
                    href="{{ url('/admin') }}"
                    @endif
                    >
                    Sistem Appointment
                </a>

                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        @guest

                        @else
                        @if (Auth::user()->level == 'dosen')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dosen.jadwal') }}">Jadwal</a>
                        </li>
                        @elseif (Auth::user()->level == 'mahasiswa')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mahasiswa.jadwal') }}">Jadwal</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dosen-index') }}">Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.mahasiswa-index') }}">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jadwal.index') }}">Jadwal</a>
                        </li>
                        @endif
                        
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a  class="dropdown-item" 

                                        @if (Auth::user()->level == 'dosen')
                                        href="{{ route('dosen.profile') }}"
                                        @elseif (Auth::user()->level == 'mahasiswa')
                                        href="{{ route('mahasiswa.profile') }}"
                                        @else
                                        href="{{ route('admin.profile') }}"
                                        @endif 

                                        >
                                        Profile
                                    </a>

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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

@yield('js')
</html>
