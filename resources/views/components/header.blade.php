<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Inspiration') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8e92148154.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app" class="l-wrapper">
        <header class="l-header" id="header">
        @if(session('flash_message'))
            <flash-message flash="{{ session('flash_message') }}"></flash-message>
        @endif

            <nav class="u-site__width p-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="c-title__header p-header__title">{{ config('app.name', 'Inspiration') }}</h1>
                </a>

                <!-- レスポンシブ用 -->
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    Left Side Of Navbar
                    <ul class="navbar-nav mr-auto">

                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="c-nav__item--wrapper">
                        <!-- Authentication Links -->
                        @guest
                            <li class="c-nav__item p-header__navItem">
                                <a class="c-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="c-nav__item p-header__navItem">
                                    <a class="c-btn p-header__btn--signup" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                    <!-- TODO テンプレのままなので修正 -->
                        <!-- <li class="nav-item dropdown"> -->
                        <li class="c-nav__item p-header__navItem">
                            <a class="c-btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();
                                "
                            >{{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                            <li class="c-nav__item p-header__navItem">
                                <a  class="c-btn p-header__btn--mypage" href="{{ route('mypage') }}"
                                >{{ __('My Page') }}</a>
                            </li>

                            </li>

                                
                        <!-- </li> -->
                    @endguest
                </ul>
            </nav>
        </header>