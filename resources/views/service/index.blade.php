@extends('layouts.app')
@section('title', 'Colance - Freelance Services Marketplace')

@section('home')
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="4"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="5"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="6"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($services as $service)
                <div class="carousel-item {{ $service->id == $first ? 'active' : '' }}" data-bs-interval="5000">
                    <a href="{{ route('services.show', $service) }}">
                        <div class="text-center">
                            <img src="{{ asset($service->serviceImage()) }}" class="slider-img">

                        </div>
                        <div class="carousel-caption d-none d-md-block slider-text text-light">
                            <h5>{{ $service->name }}</h5>
                            <p>{{ Str::of($service->description)->title()->words(7) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>


    <div class="container mb-5 mt-5">
        <div class="col-md-12">
            <h3 class='mb-4'>{{ __('lang.trendingservice') }}</h3>
            <div class="row row-cols-1 row-cols-md-6">
                @if ($services->count())
                    <div class="col-md-12 text-muted mb-3">Found {{ $services->count() }} results</div>

                    @foreach ($services as $service)
                        <div class="col-md-4 link-web">
                            <div class="productbox">
                                <div class="fadeshop">
                                    <div class="captionshop text-center">
                                        <h3>{{ $service->seller->sellername }}</h3>
                                        <p>
                                            {{ Str::of($service->description)->title()->words(59) }}
                                        </p>
                                        <p>
                                            @if ($service->seller->user()->isNot(auth()->user()))
                                                <a href="{{ route('orders.show', $service) }}"
                                                    class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i>
                                                    Purchase</a>
                                            @endif
                                            <a href="{{ route('services.show', $service) }}"
                                                class="learn-more detailslearn"><i class="fa fa-link"></i>
                                                Details</a>
                                        </p>
                                    </div>
                                    <span class="maxproduct"><img src="{{ asset($service->serviceImage()) }}"
                                            alt=""></span>
                                </div>
                                <div class="product-details">
                                    <a href="{{ route('services.show', $service) }}">
                                        <h1>{{ $service->name }}</h1>
                                    </a>
                                    <span class="price">
                                        <span class="edd_price">Rp. {{ number_format($service->price) }}</span>
                                    </span>
                                    @php
                                        $average = $service->ratings->average('rating');
                                    @endphp
                                    @if ($average != 0)
                                        <div class="price">
                                            <span class="edd_price"><span class="icon">★</span><strong>
                                                    {{ number_format($average, 1) }}</strong> <span
                                                    class="text-muted">({{ $service->ratings->count() }})</span></span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="h4">Service Not Found</div>
                @endif
            </div>

        </div>
    </div>
@endsection
