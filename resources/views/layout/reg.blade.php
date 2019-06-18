<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="position-ref full-height">
            <header class="container-fluid">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="navbar-brand logo">
                            <a href="{{ url('') }}">
                                <img src="{{ asset('/') }}img/logo.png" class="img" alt="Logo P-CASH ID INDONESIA">
                            </a>
                        </div>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menus" aria-controls="menus"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="menus">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('faq') }}">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                                </li>
                                {{--
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('workshop/trading') }}">Workshop</a>
                                </li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
