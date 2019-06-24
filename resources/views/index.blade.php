@extends('layout.reg')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('contentId',"home")
@section('content')
{{-- section content: category list --}}
<div id="sc-category" class="list-group list-group-horizontal">
    <div class="list-group-item active">
        <a href="#">
                All<small class="ml-3 mr-1"><i class="fas fa-chevron-right"></i></small>
        </a>
    </div>
    <div class="list-group-item">
        <a href="#">
                Motor<small class="ml-3 mr-1"><i class="fas fa-chevron-right"></i></small>
        </a>
    </div>
    <div class="list-group-item">
        <a href="#">
                Mobil<small class="ml-3 mr-1"><i class="fas fa-chevron-right"></i></small>
        </a>
    </div>
    <div class="list-group-item">
        <a href="#" id="search">
            <i class="fas fa-search"></i>
        </a>
    </div>
</div>

{{-- section content: banner --}}
<div id="sc-banner" class="mt-5">
    <div class="card banner-wrapper">
        <img src="{{ asset('assets/banner.png') }}" alt="" class="card-img">
        <div class="card-img-overlay">
            <div class="container p-md-5 p-2">
                <div class="row my-4">
                    <div class="col-md-7">
                        <h1 class="text-yellow banner-title">
                            BEST PRODUCT
                        </h1>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-7">
                        <h2 class="product-name">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </h2>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-7">
                        <h3 class="product-price">
                            Rp. 235.000,00
                        </h3>
                    </div>
                </div>
                <a href="#" class="btn buy-now">
                    Beli Sekarang <i class="fas fa-chevron-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- section content: products list --}}
<div id="sc-products">
    <div class="card-wrapper container">
        <div class="row justify-content-md-between">
            <a href="#">
                <div class="card col-md-4 col-sm-3">
                    <div class="card-img">
                            <img src="{{ asset('/assets/Motobatt__MTZ-2.png') }}">
                    </div>
                    <div class="card-header text-left">
                        <h5 class="product-name font-xbold mb-1">BOSCH</h5>
                        <h5 class="product-author font-weight-normal mb-3">ACCU BOSCH M8GL</h5>
                        <h6 class="product-price font-bold text-blue">Rp. 100.000,00</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card col-md-4 col-sm-3">
                    <div class="card-img">
                            <img src="{{ asset('/assets/Motobatt__MTZ-2.png') }}">
                    </div>
                    <div class="card-header text-left">
                        <h5 class="product-name font-xbold mb-1">BOSCH</h5>
                        <h5 class="product-author font-weight-normal mb-3">ACCU BOSCH M8GL</h5>
                        <h6 class="product-price font-bold text-blue">Rp. 100.000,00</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card col-md-4 col-sm-3">
                    <div class="card-img">
                            <img src="{{ asset('/assets/Motobatt__MTZ-2.png') }}">
                    </div>
                    <div class="card-header text-left">
                        <h5 class="product-name font-xbold mb-1">BOSCH</h5>
                        <h5 class="product-author font-weight-normal mb-3">ACCU BOSCH M8GL</h5>
                        <h6 class="product-price font-bold text-blue">Rp. 100.000,00</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="container my-5">
        <div class="text-center">
            <a href="#" class="btn btn-primary">Load More</a>
        </div>
    </div>
</div>
@endsection