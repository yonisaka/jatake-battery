@extends('layout.reg')

@section('content')
{{-- section content: category list --}}
<div id="sc-category" class="list-group list-group-horizontal">
    <div class="list-group-item">
        <a href="#">
                All
        </a>
    </div>
    <div class="list-group-item">
        <a href="#">
                Motor
        </a>
    </div>
    <div class="list-group-item">
        <a href="#">
                Mobil
        </a>
    </div>
    <div class="list-group-item">
        <a href="#">
            <i class="fas fa-search"></i>
        </a>
    </div>
</div>

{{-- section content: products list --}}
<div id="sc-products">
    <div class="card-wrapper container">
        <div class="row justify-content-md-between">
            <div class="card col-md-4 col-sm-3">
                <div class="card-img">
                    <a href="#">
                        <img src="{{ asset('/assets/Motobatt__MTZ-2.png') }}">
                    </a>
                </div>
                <div class="card-header text-left">
                    <h3>Lorem ipsum</h3>
                    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h5>
                </div>
            </div>
            <div class="card col-md-4 col-sm-3">
                <div class="card-img">
                    <a href="#">
                        <img src="{{ asset('/assets/Motobatt__MTZ-2.png') }}">
                    </a>
                </div>
                <div class="card-header text-left">
                    <h3>Lorem ipsum</h3>
                    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h5>
                </div>
            </div>
            <div class="card col-md-4 col-sm-3">
                <div class="card-img">
                    <a href="#">
                        <img src="{{ asset('/assets/Motobatt__MTZ-2.png') }}">
                    </a>
                </div>
                <div class="card-header text-left">
                    <h3>Lorem ipsum</h3>
                    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h5>
                </div>
            </div>
            <div class="card col-md-4 col-sm-3">
                <div class="card-img">
                    <a href="#">
                        <img src="{{ asset('/assets/Motobatt__MTZ-2.png') }}">
                    </a>
                </div>
                <div class="card-header text-left">
                    <h3>Lorem ipsum</h3>
                    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <a href="#" class="btn btn-primary">Load More</a>
        </div>
    </div>
</div>
@endsection
