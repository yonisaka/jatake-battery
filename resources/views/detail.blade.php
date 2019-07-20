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
<div class="col p-3 main-section  bg-white">
    <!--Detail Product-->
    <div class="row m-5 ">
        <div class="col-md border pb-3 pt-3">

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
        <div class="col-5 right-side-pro-box ml-5">
            <div class="row">
                <div class="card shadow-sm" style="width: 150rem;">
                    <div class="card-body">
                        <p class="card-title text-muted" style="font-display: montserrat">{{ $product->merk }}</p>
                        <h4 class="card-text pb-3 text-muted" style="border-bottom: 2px solid #707070">
                            {{ $product->name }}</h4>
                        @php
                        foreach ($product->label as $k => $v) {
                        echo '<i class="fas '.$v->value.'"></i>';
                        }
                        @endphp
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="card shadow-sm" style="width: 150rem">
                    <div class="card-body">
                        <p class="card-text">Pilih salah satu metode pembelian</p>
                        <a href="#" class="btn btn-success btn-lg btn-circle">
                            <img src="{{ asset('assets/ico-tp.png') }}" width="28" height="28">
                        </a>
                        <a href="#" class="btn btn-danger btn-lg btn-circle">
                            <b class="button-text">BL</b>
                        </a>
                        <a href="#" class="btn btn-success btn-lg btn-circle">
                            <img src="{{ asset('assets/ico-wa.png') }}" width="28" height="28">
                        </a>
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
    <div class="row">
        <div class="col ml-5">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Review</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <ul>
                        <li class="list-group">
                            <h4>{{ $product->name }}</h4>
                        </li>
                        <p> {{ !empty($product->deskripsi)?$product->deskripsi : "Belum ada deskripsi" }}
                        </p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--script-->
<script>
    // document.querySelector("#buton").onclick = function(){
    //             document.querySelector("#inp").select();
    //             document.execCommand('copy');
    //         }
</script>
@endsection
