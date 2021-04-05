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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0 shadow-sm">
                    <a class="navbar-brand " href="/"><img class="logo d-inline-block align-top" src="{{ asset('img/pokedeex.png')}}" alt="pokedeex"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <ul class="navbar-nav mr-auto">
                        @auth   
                        <li class="nav-item">
                          @if (Route::is('favsindex'))
                          <a class="nav-link" href="/"><i class="fa fa-home"></i>  Inicio</a>
                          @else
                          <a class="nav-link" href="#"><i class="fa fa-heart-o"></i>  Favoritos</a>
                          @endif
                        </li>
                        @endauth
                      </ul>
                      <img class="logo-nav-center" src="{{ asset('img/pokeball_PNG24.png')}}" alt="pokeballcenter">
                      <span class="navbar-text">
                        <ul class="navbar-nav mr-auto">
                          @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
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
                        @endguest{{-- 
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Ingresar <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                          </li> --}}

                        </ul>
                      </span>
                    </div>
                  </nav>
            </div>
        </div>
    </div>  

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
