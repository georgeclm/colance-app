@extends('layouts.app')
@section('title', 'Order details - Colance')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb h1">
                        <li class="breadcrumb-item text-success">Order details</li>
                        <li class="breadcrumb-item ">Confirm & Pay</li>
                    </ol>
                </div><br>
                <h1>Customize Your Package</h1><br>
                <div class="row">
                    <div class="col-md-3">
                        <img width="150" src="{{ asset($service->serviceImage()) }}" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="">
                            <h2>{{ $service->name }}</h2>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('orders.qty', $service) }}" method="POST">
                            @csrf

                            <select name="quantity" class="form-select" aria-label="Default select example"
                                onchange="this.form.submit()">
                                <option @if ($choice == 1) selected @endif
                                    value="1">1</option>
                                <option @if ($choice == 2) selected @endif
                                    value="2">2</option>
                                <option @if ($choice == 3) selected @endif
                                    value="3">3</option>
                                <option @if ($choice == 4) selected @endif
                                    value="4">4</option>
                                <option @if ($choice == 5) selected @endif
                                    value="5">5</option>
                                <option @if ($choice == 6) selected @endif
                                    value="6">6</option>
                                <option @if ($choice == 7) selected @endif
                                    value="7">7</option>
                                <option @if ($choice == 8) selected @endif
                                    value="8">8</option>
                                <option @if ($choice == 9) selected @endif
                                    value="9">9</option>
                                <option @if ($choice == 10) selected @endif
                                    value="10">10</option>
                            </select>
                        </form>


                    </div>
                    <div class="col-md-2">
                        <div class="h5">Rp. {{ number_format($service->price) }}</div>

                    </div>

                </div>
                <hr>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3 m-auto">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title mb-4"><strong>Summary</strong></h5>
                        <div class="d-flex mb-4">
                            <p class="card-text">Subtotal</p>
                            <div class="ms-auto">Rp. {{ number_format($total) }}</div>
                        </div>
                        <div class="d-flex">
                            <p class="card-text">Service Fee</p>
                            <div class="ms-auto">Rp. {{ number_format(($total * 10) / 100) }}</div>
                        </div>
                        <hr>
                        <div class="d-flex">
                            <p class="card-text"><strong>Total</strong> </p>
                            <div class="ms-auto"><strong>Rp. {{ number_format(($total * 110) / 100) }}</strong>
                            </div>
                        </div>
                        <div class="d-flex">
                            <p class="card-text">Delivery Time</p>
                            <div class="ms-auto">{{ $service->delivery_time }} day</div>
                        </div>
                        <div class="text-center">
                            <form action="{{ route('orders.pay', $service) }}" method="POST">
                                @csrf
                                <input type="hidden" name="price" value="{{ $total }}">
                                <button class="btn btn-lg btn-success mb-2">Continue to
                                    Checkout</button>
                            </form>
                            <div class="text-muted">You won't be charged yet</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
