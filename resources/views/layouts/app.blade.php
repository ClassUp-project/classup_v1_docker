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




        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <div><img src="/logo/Class'Up.png" style="max-height:50px;" alt=""></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item  pr-3">
                         <button type="submit" style="border-radius:12px 0 12px 0;background: #478bf9;border:none;
                         font:bold 12px Verdana; padding:6px 0 6px 0;">
                                <a class="nav-link" style="color:#fff" href="{{ route('login') }}">SE CONNECTER</a>
                                  </button>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                       <button type="submit" style="border-radius:12px 0 12px 0;background:#478bf9 ;border:none;font:bold 12px Verdana; padding:6px 0 6px 0;">
                                    <a class="nav-link"  style="color:#fff" href="{{ route('register') }}"> S'INSCRIRE</a>
                                       </button>
                                </li>
                            @endif
                        @else
                            <div class="nav-item dropdown">
                                <button type="button" class="btn btn-primary rounded-pill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#fff ;font-family: cursive">
                                    {{ Auth::user()->prenom }} <span class="caret"></span>
                                </a>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!--
                                    <a class="dropdown-item" href="{{-- route('profile.show',Auth::user()) --}}">
                                        Mon profil
                                    </a>
                                    -->
                                    <!--
                                    <a class="dropdown-item" href="{{-- route('classe',Auth::user()) --}}">
                                        Ma classe
                                    </a>
                                    -->

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                        @csrf

                                    </form>


                                    @can('manage-users')
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        <button type="button" class="btn btn-success">
                                         Gestion générale
                                        </button>
                                    </a>
                                    @endcan
                                </div>



                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


          <main class="p-4">

           {{--notification--}}
           {{--@include('sweetalert::alert')--}}
            @yield('content')

            </main>
        </div>



</body>
</html>
