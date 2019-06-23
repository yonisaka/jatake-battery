<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jatake Battery</title>

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        @yield('head')
    </head>
    <body>
        <div class="bg-light">
            <div id="mainwrapper">
                <header class="container-fluid">
                    <nav class="navbar justify-content-center">
                        <div class="navbar-brand logo">
                            <a href="{{ url('') }}">
                                <img src="{{ asset('assets/logo.png') }}" class="img" alt="Jatake Battery">
                            </a>
                        </div>
                    </nav>
                </header>
                <div class="container" id="@yield('contentId')">
                    @yield('content')
                </div>
                <footer class="container-fluid text-white">
                    <div class="container">
                        <div class="row py-5">
                            <div class="col-md-4">
                                <a href="{{ url('') }}">
                                    <img src="{{ url('/assets/logo_white.png') }}" class="logo" alt="Jatake Battery">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            Kontak
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ url('extra-pages/term-condition') }}">
                                                    Syarat & Ketentuan
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            Cari Kami!
                                        </h4>

                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="https://goo.gl/maps/frLfpp1cpPZJsbaQ6" target="_blank">
                                                    Jl. Raya Gatot Subroto Km. 8 (sebelah indomaret) 
                                                    Kec. Jatiuwung, Kota/Kab. Tangerang 
                                                    Banten, 15134
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="https://goo.gl/maps/frLfpp1cpPZJsbaQ6" target="_blank">
                                    <img src="{{ asset('assets/maps.PNG') }}" alt="" srcset="">
                                </a>
                            </div>
                        </div>
                    </div>
                        <div class="py-2 bg-dark">
                            <div class="container">
                                <div class="text-right">
                                    <b>Jatake.LeaProjects&copy;{{ date('Y') }}</b>
                                </div>
                            </div>
                        </div>
                </footer>
            </div>
        </div>
    </body>
    <script src="{{ asset('/modules/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/modules/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/modules/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</html>
