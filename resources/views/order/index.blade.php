@extends('layouts.app')
@section('title', 'My Orders - Colance')

@section('content')
    <div class="container">
        {{-- @if (session('rating')) --}}

        {{-- @endif --}}

        <div class="col-sm-10">
            <div class="trending-wrapper">
                @if ($orders->count() != 0)
                    <h2 class="mb-3">{{ __('lang.order') }}</h2>
                    @foreach ($orders as $order)
                        <x-review :serviceid="$order->service_id" :orderid="$order->id" />

                        <div class="row searched-item cart-list-divider">
                            <div class="col-sm-3">
                                <a href="{{ route('services.show', $order->service_id) }}">
                                    <img width="150" src="{{ asset("storage/service/{$order->image}") }}">
                                </a>
                            </div>
                            <div class="col-sm-7">
                                <div class="">
                                    <div class="h2">Name: {{ $order->name }}</div>
                                    <div class="h5">Delivery Status: {{ $order->status }}</div>
                                    <div class="h5">Description: {{ Str::limit($order->description, 40) }}</div>
                                    <div class="h5">Payment Status: {{ $order->payment_status }}</div>
                                    <div class="h5">Paymenent Method: {{ $order->payment_method }}</div>
                                    <div class="h5">Quantity: {{ $order->quantity }}</div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-outline-success" data-bs-toggle="modal" type="button"
                                    data-bs-target="#rating">Finish Order</button>
                            </div>

                        </div>
                    @endforeach

                @else
                    <div class="d-grid gap-2 col-5 mx-auto text-center">
                        <br><br>
                        <h2 class="mb-3 fs-1">{{ __('lang.orderempty') }}</h2>
                        <a class="btn btn-outline-secondary btn-lg" href="{{ route('wishlists.show') }}">
                            {{ __('lang.gotowish') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
