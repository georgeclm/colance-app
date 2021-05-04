@extends('layouts.app')
@section('title', 'Colance - Freelance Services Marketplace')

@section('home')
    <div class="container mb-5 mt-5">
        <div class="col-md-12 mb-5">
            <div class="container banner text-start">
                <div class="row justify-content-around">
                    <div class="col-md-12 text1 mb-4">
                        <h1>The Indonesia’s Freelance Website</h1>
                        <h2>Engage the largest network of trusted independent professionals to unlock the full potential of your business.</h2>
                    </div>
                        <div class="col-md-6 mb04">
                        <img src="{{ asset('image/banner.svg') }}" alt="mantap" class="img-responsive" width="500px" height="300px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h3 class="bold">Explore</h3>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-3 px-4 py-4 text-center icon-setting">
                        <a href=""><img src="{{ asset('image/art-design.png') }}" alt="" class="img-responsive mb-3 " width="50px" height="55px"></a>
                        <p class="bold">Design & Creative</p>
                    </div>
                    <div class="col-md-3 px-4 py-4 text-center">
                        <a href=""><img src="{{ asset('image/pencil.png') }}" alt="" class="img-responsive mb-3" width="50px" height="55px"></a>
                        <p class="bold">Writing & Translation</p>
                    </div>
                    <div class="col-md-3 px-4 py-4 text-center">
                        <a href=""><img src="{{ asset('image/photo.png') }}" alt="" class="img-responsive mb-3" width="50px" height="55px"></a>
                        <p class="bold">Photography</p>
                    </div>
                    <div class="col-md-3 px-4 py-4 text-center">
                        <a href=""><img src="{{ asset('image/code.png') }}" alt="" class="img-responsive mb-3" width="50px" height="55px"></a>
                        <p class="bold">Programming</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
