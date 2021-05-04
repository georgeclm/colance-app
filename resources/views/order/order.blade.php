@extends('layouts.app')
@section('title', 'Secure Checkout - Colance')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb h1">
                        <li class="breadcrumb-item">Order details</li>
                        <li class="breadcrumb-item text-success">Confirm & Pay</li>
                    </ol>
                </div><br>
                <h1>Confirm and Pay</h1><br>
                <form action="{{ route('orders.store') }}" method="POST" id="orderform">
                    @csrf
                    <div class="form-group">
                        <textarea name="description" placeholder="Describe your request" class="form-control" rows="5"
                            required></textarea>
                    </div><br>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1"
                                value="Gopay">
                            <label class="form-check-label h4" for="flexRadioDefault1"> Gopay
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" value="OVO">
                            <label class="form-check-label h4" for="flexRadioDefault1"> OVO
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1"
                                value="Credit">
                            <label class="form-check-label h4" for="flexRadioDefault1"> Credit
                                & Debit Card
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label h4">Promo Code</label>
                            <input type="text" name="promocode" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Promo code goes here" autofocus>
                            <span>
                                <strong>Not required</strong>
                            </span>
                        </div>
                    </div><br>
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <input type="hidden" name="quantity" value="{{ $price / $service->price }}">
                </form>


            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3 m-auto">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title mb-4"><strong>Summary</strong></h5>
                        <div class="d-flex mb-4">
                            <p class="card-text">Subtotal</p>
                            <div class="ms-auto">Rp. {{ number_format($price) }}</div>
                        </div>
                        <div class="d-flex">
                            <p class="card-text">Service Fee</p>
                            <div class="ms-auto">Rp. {{ number_format(($price * 10) / 100) }}</div>
                        </div>
                        <hr>
                        <div class="d-flex">
                            <p class="card-text"><strong>Total</strong> </p>
                            <div class="ms-auto"><strong>Rp. {{ number_format(($price * 110) / 100) }}</strong>
                            </div>
                        </div>
                        <div class="d-flex">
                            <p class="card-text">Delivery Time</p>
                            <div class="ms-auto">{{ $service->delivery_time }} day</div>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-lg btn-success mb-2" type="submit" form="orderform"
                                value="Confirm & Pay" />
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection
