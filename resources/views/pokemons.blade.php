<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokechallenge</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>

</head>
<body class="text-center">
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
                          <a class="nav-link" href="{{ route('favsindex') }}"><i class="fa fa-heart-o"></i>  Favoritos</a>
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
                        @endguest
                        </ul>
                      </span>
                    </div>
                  </nav>
            </div>
        </div>
        <div id="poke">
        </div>
    </div>    
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>