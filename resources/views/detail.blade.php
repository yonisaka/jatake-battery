@extends('layout.main')
@section('head')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection
@section('contentId',"home")
@section('content')
@php
$product->label = !empty($product->label) ? $product->label : [];
$product->img = !empty($product->img) ? $product->img : [];
@endphp
<div class="col p-3 main-section mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb shadow-sm border mx-5 bg-white px-3">
            <li class="breadcrumb-item">
                <b><a class="text-primary" href="{{ url('') }}"><i class="fas fa-home"></i>&nbsp;Home</a></b></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($product->short) ? $product->short : $product->id }}</li>
        </ol>
    </nav>
    <!--Detail Product-->
    <div class="row mx-5 mt-2 mb-4">
        <div class="col-md-5 border bg-white shadow-sm py-3 my-2">
            <div class="product-img">
                @php
                if(empty($product->img))
                {
                @endphp
                <img src="no-souce" class="col-md-12">
                @php
                }
                foreach ($product->img as $k => $v) {
                @endphp
                <img src="{{ $v }}" class="col-md-12">
                @php
                } @endphp
            </div>
            <div class="product-img-nav">
                @php
                if(empty($product->img))
                {
                @endphp
                <img src="no-souce" class="col-md-12">
                @php
                }
                foreach ($product->img as $k => $v) {
                @endphp
                <img height="50px" src="{{ $v }}" class="col-md-12">
                @php
                } @endphp
            </div>
        </div>
        <div class="col-md-6 offset-md-1 my-2">
            <div class="row">
                <div class="card shadow-sm" style="width: 150rem;">
                    <div class="card-body">
                        <p class="card-title text-muted" style="font-display: montserrat">{{ $product->merk }}</p>
                        <h4 class="card-text pb-3 text-muted" style="border-bottom: 2px solid #707070">
                            {{ $product->name }}</h4>
                        <ul class="list-inline product-labels py-3">
                            @php
                            foreach ($product->label as $k => $v) {
                            @endphp
                            <li class="list-inline-item">
                                <i class="fas {{ $v->value }}"></i>&nbsp;{{ $v->info }}
                            </li>
                            @php
                            }
                            @endphp
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="card shadow-sm" style="width: 150rem">
                    <div class="card-body">
                        <div class="card-text">
                            <h5>{{ formating($product->price,'price') }}</h5>
                        </div>
                        <p class="card-text">Pilih salah satu metode pembelian</p>
                        <button {{ empty($product->link->tp) ? 'disabled' : null}}
                            data-link="{{ !empty($product->link->tp) ? $product->link->tp : null}}"
                            class="btn-shop btn btn-success btn-lg btn-circle">
                            <span>
                                Tokopedia
                            </span>
                            <img class="svg" src="{{ asset('assets/ico-tp.svg') }}" width="32" height="32">
                        </button>
                        <button {{ empty($product->link->bl) ? 'disabled' : null}}
                            data-link="{{ !empty($product->link->bl) ? $product->link->bl : null}}"
                            class="btn-shop btn btn-danger btn-lg btn-circle">
                            <span>Bukalapak</span>
                            <b class="button-text">BL</b>
                        </button>
                        <button {{ empty($product->link->wa) ? 'disabled' : null}}
                            data-link="{{ !empty($product->link->wa) ? 'https://api.whatsapp.com/send?phone='.$product->link->wa.'&text='.rawurlencode('Halo, Saya ingin membeli '.$product->name.'.') : null}}"
                            class="btn-shop btn btn-success btn-lg btn-circle">
                            <span>Whatsapp</span>
                            <img class="svg" src="{{ asset('assets/ico-wa.svg') }}" width="32" height="32">
                        </button>
                        <button {{ empty($product->link->sp) ? 'disabled' : null}}
                            data-link="{{ !empty($product->link->sp) ? $product->link->sp : null}}"
                            class="btn-shop btn btn-success btn-lg btn-circle">
                            <span>Shoopie</span>
                            <img class="svg" src="{{ asset('assets/ico-sp.svg') }}" width="32" height="32">
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="input-group">
                    <input id="product-link" type="text" class="form-control" placeholder="Link"
                        value="{{ !empty($product->short) ? url('products/'.$product->short) : url('products/'.$product->id) }}">
                    <div class="input-group-append">
                        <button class="copylink btn btn-outline-primary" data-input="#product-link" type="button">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Review-->
    <div class="row mb-5">
        <div class="col ml-5">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Deskripsi</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Review</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="card-body">
                    <ul>
                        <li class="list-group">
                            <h4>{{ $product->name }}</h4>
                        </li>
                        <p> {{ !empty($product->deskripsi)?$product->deskripsi : "Belum ada deskripsi" }}
                        </p>
                        <h5>Syarat dan Ketentuan:</h5>
                        @include('term-cond')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" async>
    $(window).on('load',()=>{
        $(".product-img").slick({
            adaptiveHeight: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            respondTo: $('.product-img').parent(),
            accessibility: true,
            prevArrow:
                '<button type="button" class="btn p-0 slick-prev"><i class="text-secondary fas fa-arrow-circle-left"></i></button>',
            nextArrow:
                '<button type="button" class="btn p-0 slick-next"><i class="text-secondary fas fa-arrow-circle-right"></i></button>',
            fade: false,
            asNavFor: ".product-img-nav",
            infinite: false,
            useTransform: true,
            cssEase: "cubic-bezier(0.77, 0, 0.18, 1)"
        });
        $(".product-img-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
            asNavFor: ".product-img",
            dots: false,
            arrows: false,
            focusOnSelect: true
        });
    })


</script>
@endsection
