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
<div class="col p-3 main-section mb-5 bg-white">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mx-5 bg-white px-0">
            <li class="breadcrumb-item"><a href="{{ url('') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($product->short) ? $product->short : $product->id }}</li>
        </ol>
    </nav>
    <!--Detail Product-->
    <div class="row mx-5 mt-2 mb-4">
        <div class="col-md-5 border py-3 my-2">
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
                        <div class="product-labels py-3">
                            @php
                            foreach ($product->label as $k => $v) {
                            echo '<i class="fas '.$v->value.'"></i>';
                            }
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="card shadow-sm" style="width: 150rem">
                    <div class="card-body">
                        <p class="card-text">Pilih salah satu metode pembelian</p>
                        <button {{ empty($product->link->tp) ? 'disabled' : null}}
                            data-link="{{ !empty($product->link->tp) ? $product->link->tp : null}}"
                            class="btn-shop btn btn-success btn-lg btn-circle">
                            <span>
                                Tokopedia
                            </span>
                            <img src="{{ asset('assets/ico-tp.png') }}" width="28" height="28">
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
                            <img src="{{ asset('assets/ico-wa.png') }}" width="28" height="28">
                        </button>
                        <button {{ empty($product->link->sp) ? 'disabled' : null}}
                            class="btn-shop btn btn-success btn-lg btn-circle">
                            <span>Shoopie</span>
                            <img src="{{ asset('assets/ico-wa.png') }}" width="28" height="28">
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Link"
                        value="{{ !empty($product->short) ? url('products/'.$product->short) : url('products/'.$product->id) }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">
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

<!--script-->
<script type="text/javascript">
    // document.querySelector("#buton").onclick = function(){
    //             document.querySelector("#inp").select();
    //             document.execCommand('copy');
    //         }
</script>
@endsection
