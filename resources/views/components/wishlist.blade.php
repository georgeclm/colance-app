<div>
    <div class="container">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                @if ($services->count() != 0)
                    <h2 class="mb-3">Your Wishlist</h2>
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
                        <h2 class="mb-3 fs-1">Wishlist is empty </h2>
                        <a class="btn btn-outline-primary btn-lg" href="{{ route('services.index') }}">Start
                            Shopping</a>
                    </div>

                @endif


            </div>
        </div>
    </div>
</div>
