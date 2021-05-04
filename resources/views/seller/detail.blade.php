@extends('layouts.app')
@section('title', "{$seller->sellername} - Colance")

@section('home')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ asset($seller->sellerImage()) }}" class="rounded-circle" width="200px" height="200px">

            </div>
            <div class="link-web col-sm-4">
                <a href="{{ route('services.index') }}" class="btn btn-outline-primary mb-3">Back</a>
                <h2><strong>{{ $seller->sellername }}</strong></h2>
                <h3>{{ $seller->address }}</h3>
                <a class="h4" href="{{ $seller->url }}" target="blank">{{ $seller->url }}</a>
                <div class="h4 mt-2">
                    <strong>{{ $seller->followers->count() }}</strong>
                    followers
                </div>
            </div>
            <div class="col-sm-4">
                <div class="h4"><strong> Description</strong></div>
                <div class="h5">{{ $seller->description }}</div>
            </div>
            @if ($seller->user()->is(auth()->user()))
                <div class="col-sm-2 align-self-end">
                    <a href="{{ route('services.create') }}" class="btn btn-outline-success mb-3">Add
                        Service</a>
                    <a href="{{ route('sellers.edit', $seller) }}" class="btn btn-outline-secondary mb-3">Update
                        Seller
                        Profile</a>
                </div>


            @endif

        </div>
        <div class="row">
            <div class="container trending-wrapper mb-5">
                @if ($services->count())
                    <h3 class='mb-4 text-center'>
                    @if ($seller->user()->is(auth()->user()))Your Services @else
                            {{ $seller->sellername }} Services @endif
                    </h3>
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
                                                            class="learn-more detailslearn"><i
                                                                class="fa fa-shopping-cart"></i>
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

                @else
                    <h3>
                        @if ($seller->user()->is(auth()->user()))You didn't Sell any
                            Service
                        Yet @else
                            {{ $seller->sellername }} Didn't Have any Services Yet @endif
                    </h3>
                @endif
            </div>
        </div>
    </div>
@endsection
