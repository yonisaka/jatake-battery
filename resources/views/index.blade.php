@extends('layout.main')
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('contentId',"home")
@section('content')
{{-- section content: category list --}}
<div id="sc-category" class="list-group list-group-horizontal">
    <div class="list-group-item active">
        <a href="#" data-type='all'>
            All<small class="ml-3 mr-1"><i class="fas fa-chevron-right"></i></small>
        </a>
    </div>
    <div class="list-group-item">
        <a href="#" data-type='MOTOR'>
            Motor<small class="ml-3 mr-1"><i class="fas fa-chevron-right"></i></small>
        </a>
    </div>
    <div class="list-group-item">
        <a href="#" data-type='MOBIL'>
            Mobil<small class="ml-3 mr-1"><i class="fas fa-chevron-right"></i></small>
        </a>
    </div>
    <div class="list-group-item">
        <a href="#" id="search">
            <i class="fas fa-search"></i>
        </a>
    </div>
</div>
@php
if(!empty($products[0]))
{
@endphp
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
                <div class="row my-0">
                    <div class="col-md-7">
                        <h2 class="product-merk">
                            {{ $products[0]->merk }}
                        </h2>
                    </div>
                </div>
                <div class="row mb-4 mt-0">
                    <div class="col-md-7">
                        <h2 class="product-name">
                            {{ $products[0]->name }}
                        </h2>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-7">
                        <h3 class="product-price">
                            {{ formating($products[0]->price,'price') }}
                        </h3>
                    </div>
                </div>
                <a href="{{ url('products/') }}/{{ $products[0]->short ? $products[0]->short : $products[0]->id }}"
                    class="btn buy-now">
                    Beli Sekarang <i class="fas fa-chevron-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@php
}
@endphp
{{-- section content: products list --}}
<div id="sc-products">
    <div class="card-wrapper container">
        <div class="row">
            @php
            if(empty($products[0]))
            {
            echo '
            <div class="col text-center">
                <h3>Belum ada product</h3>
            </div>';
            }
            foreach ($products as $k => $d) {

            @endphp
            <a class="products-card" href="{{ url('products/') }}/{{ $d->short?$d->short:$d->id }}"
                data-type="{{ $d->type }}">
                <div class="card col-md-4 col-sm-3">
                    <div class="card-img">
                        <img src="{{ $d->img[0] }}">
                    </div>
                    <div class="card-header text-left">
                        <h5 class="product-name font-xbold mb-1">{{ $d->merk }}</h5>
                        <h5 class="product-author font-weight-normal">{{ $d->name }}</h5>
                        <h5 class="products-type mb-2">
                            @php
                            if($d->type == "MOTOR"){
                            @endphp
                            <i class="fas fa-motorcycle"></i>
                            @php
                            }
                            else{
                            @endphp
                            <i class="fas fa-car"></i>
                            @php
                            }
                            @endphp
                        </h5>
                        <h6 class="product-price font-bold text-blue">{{ formating($d->price,'price') }}</h5>
                    </div>
                </div>
            </a>
            @php

            }
            @endphp
        </div>
    </div>
    <div class="container my-5">
        <div class="text-center">
            <a href="#" class="btn btn-primary">Load More</a>
        </div>
    </div>
</div>
@endsection
