<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jatake Battery - {{ !empty($pages)? $pages : "Halaman Depan" }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="{{ asset('modules/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('modules/bootstrap-4.3.1/js/bootstrap.min.js') }}" async></script>
    <script src="{{ asset('modules/sweetalert2.all.min.js') }}" async></script>
    <script src="{{ asset('modules/fontawesome/js/all.min.js') }}" async></script>
    <script src="{{ asset('modules/slick/slick.min.js') }}" async></script>
    <script src="{{ asset('js/main.js') }}" async></script>
    @yield('head')
</head>
{{ empty($page)?$page='':null }}
@include('loader')

<body>
    <div class="bg-light">
        <div class="main-wrapper">
            <header class="container-fluid border-bottom">
                <div class="top-header bg-dark d-none">
                    <div class="container">
                        08123456789
                    </div>
                </div>
                <nav class="navbar">
                    <div class="container navbar-cont">
                        <div class="col-md-3 text-center">
                            <div class="navbar-brand logo">
                                <a href="{{ url('') }}">
                                    <img src="{{ asset('assets/logo.png') }}" class="img" alt="Jatake Battery">
                                </a>
                            </div>
                        </div>
                        <div class="col-md text-right">
                            {{-- section content: category list --}}
                            <div class="navbar-nav">
                                <div class="mainnav row">
                                    <div class="mt-2 col-md-5">
                                        <div class="container">
                                            <form action="{{ url('/search') }}" method="get">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Cari apa gan?"
                                                        value="{{ !empty($s)?$s:'' }}" name="s" type="text" id="search">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-search"></i></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="list-group list-group-horizontal">
                                            <div class="list-group-item {{ $page=="home"? 'active' : null }}">
                                                <div class="nav-link">
                                                    <a href="{{ url('') }}" data-type='all'>
                                                        Beranda
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="list-group-item {{ $page=="motor"? 'active' : null }}">
                                                <div class="nav-link">
                                                    <a href="{{ url('/motor') }}" data-type='motor'>
                                                        Motor
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="list-group-item {{ $page=="mobil"? 'active' : null }}">
                                                <div class="nav-link">
                                                    <a href="{{ url('/mobil') }}" data-type='mobil'>
                                                        Mobil
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="list-group-item {{ $page=="term"? 'active' : null }}">
                                                <div class="nav-link">
                                                    <a href="{{ url('/term-condition') }}" data-type='mobil'>
                                                        Syarat & Ketentuan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="content py-5" id="@yield('contentId')">
                @yield('content')
            </div>
            <footer class="container-fluid text-white p-0">
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
                                            email : email@gmail.com
                                        </li>
                                        <li>
                                            <a href="#" onclick="showTermCond(false)">
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
                            <a class="map" href="https://goo.gl/maps/frLfpp1cpPZJsbaQ6" target="_blank">
                                <img src="{{ asset('assets/maps.PNG') }}" alt="" srcset="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="py-2 bg-dark">
                    <div class="container">
                        <div class="text-right">
                            <b>Jatake.LenergyProjects&copy;{{ date('Y') }}</b>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal modalbox" id="term-cond-modal">
        <div class="modal-dialog modal-dialog-scrollable mx-auto">
            <div class="shadow-lv2 overflow-hidden rounded modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Syarat Ketentuan</h5>
                </div>
                <div class="modal-body">
                    @include('term-cond')
                </div>
                <div class="modal-footer">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" name="" class="accept-term" disabled>
                        <span class="ml-2">
                            <b> Saya setuju blabalbalblala</b>
                        </span>
                    </div>
                    <div class="btn-wrapper mt-3">
                        <button class="cancel btn btn-danger">Batal</button>
                        <button class="continue-term float-right btn btn-success" disabled>Beli
                            Sekarang!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
