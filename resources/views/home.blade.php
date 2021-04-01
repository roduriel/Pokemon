<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#"><img class="logo d-inline-block align-top" src="{{ asset('img/pokedeex.png')}}" alt="pokedeex"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pricing</a>
                        </li>
                      </ul>
                      <span class="navbar-text">
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                          </li>
                        </ul>
                      </span>
                    </div>
                  </nav>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
          <div class="col-6 ">
            <div class="input-group">
              <input class="form-control form-control-lg rounded-pill py-2 pr-5 mr-1 bg-transparent" type="search" placeholder="Search" id="search-input1">
              <span class="input-group-append">
                  <div class="input-group-text border-0 bg-transparent ml-n5 "><i class="fa fa-search"></i></div>
              </span>
            </div>
          </div>
        </div>
    </div>    
</body>
</html>