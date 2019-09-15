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
        <div class="row">
            <div class="col-md-6">
                <div id="banner-img">
                    <img src="{{ asset('assets/banner.png') }}" class="col-12" alt="" srcset="">
                    <img src="{{ asset('assets/banner.png') }}" class="col-12" alt="" srcset="">
                    <img src="{{ asset('assets/banner.png') }}" class="col-12" alt="" srcset="">
                </div>
            </div>
            <div class="col-md">
                <img src="https://cdn.shopify.com/s/files/1/2018/8867/files/play-button.png" alt="" srcset="">
            </div>
        </div>
    </div>
</div>
@php
}
@endphp
{{-- section content: products list --}}
<script>
    $(window).on('load',()=>{
        $("#banner-img").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                accessibility: true,
                infinite: true,
                useTransform: true,
                dots: true,
                cssEase: "cubic-bezier(0.77, 0, 0.18, 1)"
        });
    })
</script>
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
