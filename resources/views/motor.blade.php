@extends('layout.main')
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('contentId',"home")
@section('content')
{{-- section content: products list --}}
<div id="sc-products">
    <div class="card-wrapper container">
        <div class="row justify-content-around">
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
            <a class="card products-card col-md-3 col-sm-4"
                href="{{ url('products/') }}/{{ $d->short?$d->short:$d->id }}" data-type="{{ $d->type }}">
                <div class="card-img">
                    <img src="{{ !empty($d->img[0]) ? $d->img[0] : '' }}">
                </div>
                <div class="card-header text-left">
                    <h5 class="product-name font-light mb-1">{{ $d->merk }}</h5>
                    <h5 class="product-author">{{ $d->name }}</h5>
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
