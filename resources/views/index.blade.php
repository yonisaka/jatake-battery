@extends('layout.main')
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('contentId',"home")
@section('content')

@php
if(!empty($products[0]))
{
@endphp
{{-- section content: banner --}}
<div id="sc-banner" class="container-fluid">
    <div class="container">

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
</div>
@php
}
@endphp
{{-- section content: products list --}}
<div id="sc-products" class="container-fluid">
    <div class="container">
        <div class="card-wrapper container">
            <h3>Aki Motor</h3>
            <div class="row justify-content-md-start justify-content-around">
                @php
                if(count($products->where('type','motor')) == 0)
                {
                echo '
                <div class="col text-center">
                    <h4>Produk tidak ditemukan</h4>
                </div>';
                }
                foreach ($products->where('type','motor') as $k => $d) {
                @endphp
                <a class="card products-card mx-1 col-md-3 col-sm-4"
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
            <div class="text-md-left text-center">
                <a href="{{ url('motor') }}" class="btn btn-outline-primary">Lihat Lainnya</a>
            </div>
        </div>

        <div class="card-wrapper container mt-5">
            <h3>Aki Mobil</h3>
            <div class="row justify-content-md-start justify-content-around">
                @php
                if(count($products->where('type','mobil')) == 0)
                {
                echo '
                <div class="col text-center">
                    <h4>Produk tidak ditemukan</h4>
                </div>';
                }
                foreach ($products->where('type','mobil') as $k => $d) {
                @endphp
                <a class="card products-card mx-1 col-md-3 col-sm-4"
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

            <div class="text-md-left text-center">
                <a href="{{ url('mobil') }}" class="btn btn-outline-primary">Lihat Lainnya</a>
            </div>
        </div>
    </div>
</div>
<div id="sc-testimoni" class="container-fluid">
    <div class="container">
        <div class="text-center">
            <h4 class="font-light">Bagaimana pendapat mereka tentang <b>Jatake Battery</b>?</h4>
        </div>
        <div class="card-wrapper container mt-5">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="testimo-photo">
                                <div class="photo-border">
                                    <img src="{{ asset('assets/testimo.jpg') }}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="testimo-name">
                                <h5>Alexander Volentinus</h5>
                            </div>
                            <div class="testimo-words">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, excepturi. Officiis
                                    fuga
                                    deserunt accusamus voluptatibus consequuntur cum modi aliquam cupiditate eius
                                    dolorum
                                    veniam
                                    repellat nihil, non tempora delectus accusantium? Recusandae?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="testimo-photo">
                                <div class="photo-border">
                                    <img src="{{ asset('assets/testimo.jpg') }}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="testimo-name">
                                <h5>Alexander Volentinus</h5>
                            </div>
                            <div class="testimo-words">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, excepturi. Officiis
                                    fuga
                                    deserunt accusamus voluptatibus consequuntur cum modi aliquam cupiditate eius
                                    dolorum
                                    veniam
                                    repellat nihil, non tempora delectus accusantium? Recusandae?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="testimo-photo">
                                <div class="photo-border">
                                    <img src="{{ asset('assets/testimo.jpg') }}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="testimo-name">
                                <h5>Alexander Volentinus</h5>
                            </div>
                            <div class="testimo-words">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, excepturi. Officiis
                                    fuga
                                    deserunt accusamus voluptatibus consequuntur cum modi aliquam cupiditate eius
                                    dolorum
                                    veniam
                                    repellat nihil, non tempora delectus accusantium? Recusandae?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
