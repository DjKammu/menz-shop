<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url(asset('images/fav.png')) }}">

    <!-- <title>{{ config('app.name', 'Rechnung - Menz Shop') }}</title> -->
    <title>Menz Belegportal</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ url(asset('vendor/bootstrap/css/bootstrap.min.css')) }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ url(asset('vendor/fontawesome-free/css/all.min.css')) }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ url(asset('css/style.css')) }}" rel="stylesheet">
    <link href="{{ url(asset('css/daterangepicker.css')) }}" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom fonts for this template -->
    <script src="https://use.fontawesome.com/8d7882db98.js"></script>

  </head>

  <body id="top">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar 
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar 
                    <ul class="navbar-nav ml-auto"> -->
                        <!-- Authentication Links -->
                        <!-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else -->
                            <!-- <li class="nav-item dropdown">
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
                </div>
            </div>
        </nav> -->

            @yield('content')


      <footer class="menz-footer text-center menz-login-footer">
        © {{ date('Y') }} Copyright - Menz GmbH - Naturbaustoffe In Wiesbaden 
        </br>
       <a href="https://menz-gmbh.de/impressum/">IMPRESSUM</a> | <a href="https://menz-gmbh.de/datenschutz/">DATENSCHUTZ</a>  | <a href=" https://menz-gmbh.de/kontakt/">KONTAKT </a> | <a href="{{ route('faq') }}">FAQ</a> 

      </footer>

     <!-- Bootstrap core JavaScript -->
     <script src="{{ url(asset('vendor/jquery/jquery.min.js')) }}"></script>
     <script src="{{ url(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')) }}"></script>
 
     <!-- Plugin JavaScript -->
     <script src="{{ url(asset('vendor/jquery-easing/jquery.easing.min.js')) }}"></script>

    <!-- Custom JavaScript -->
    <script src="{{ url(asset('js/form.js')) }}"></script>

    <script src="{{ url(asset('js/moment.min.js')) }}"></script>
    <script src="{{ url(asset('js/daterangepicker.min.js')) }}"></script>
  </body>
    
  </html>

