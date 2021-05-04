@extends('layouts.app')
@section('title', 'Your Wishlist - Colance')
@section('content')
    <div class="container">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                @php
                    use App\Models\Service;
                    $user = auth()->user();
                    $wishlists = $user->favorite()->pluck('service_id');
                    $services = Service::whereIn('id', $wishlists)
                        ->latest()
                        ->get();

                @endphp
                @if ($services->count() != 0)
                    <h2 class="mb-3">{{ __('lang.wishlist') }}</h2>
                    <br><br>

                    @foreach ($services as $service)
                        <div class="row searched-item cart-list-divider">
                            <div class="col-sm-3">
                                <a href="{{ route('services.show', $service) }}">
                                    <img class="trending-image" src="{{ asset($service->serviceImage()) }}">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="">
                                    <div class="h2">{{ $service->name }}</div>
                                    <div class="h5">{{ Str::limit($service->description, 25) }}</div>
                                    <div class="h5">Rp. {{ number_format($service->price) }}</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                @php
                                    $favorite = auth()->user()
                                        ? auth()
                                            ->user()
                                            ->favorite->contains($service->id)
                                        : false;
                                @endphp

                                <wishlist-button service-id="{{ $service->id }}" favorite="{{ $favorite }}">
                                </wishlist-button>

                            </div>

                        </div>
                    @endforeach

                @else
                    <div class="d-grid gap-2 col-5 mx-auto text-center">
                        <br><br>
                        <h2 class="mb-3 fs-1">{{ __('lang.wishlistempty') }}</h2>
                        <a class="btn btn-outline-primary btn-lg"
                            href="{{ route('services.index') }}">{{ __('lang.shopping') }}</a>
                    </div>

                @endif


            </div>
        </div>
    </div>

@endsection
