<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EarthLove')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <h1 class="mb-0 fw-bold" style="color:#3b7d4d;">EarthLove</h1>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" 
                                class="nav-link dropdown-toggle text-dark fw-semibold" 
                                href="#" 
                                role="button" 
                                data-bs-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false" 
                                v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end border-0 shadow rounded-4" 
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-2" href="{{ url('admin\dashboard') }}">
                                    {{__('Dashboard')}}
                                </a>
                                <a class="dropdown-item py-2" href="{{ url('admin\profile') }}">
                                    {{__('Profile')}}
                                </a>
                                <a class="dropdown-item py-2" 
                                    href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" 
                                    action="{{ route('logout') }}" 
                                    method="POST" 
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main style="background-color:#faf8f4; min-height:calc(100vh - 80px);">
            <x-alert />
            @yield('content')
        </main>
    </div>
</body>
</html>