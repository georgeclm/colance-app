<div class="row row-cols-1 row-cols-md-6">
    @if ($services->count())
        <div class="col-md-12 text-muted mb-3">Found {{ $services->count() }} results</div>

        @foreach ($services as $service)

            <div class="col mb-4 link-web">
                <a href="{{ route('services.show', $service) }}">
                    <div class="card h-100 rounded" style="width: 12rem;">
                        <img src="{{ asset($service->serviceImage()) }}" class="card-img-top"
                            style="width: 12rem; height: 12rem; background-size: cover; background-position: center;">
                        <div class="card-body">
                            <div class="h6 card-title">{{ $service->name }}</div>
                            <div class="h5 card-text"> Rp. {{ number_format($service->price) }}</div>
                            @php
                                $average = $service->ratings->average('rating');
                            @endphp
                        </div>

                        @if ($average != 0)
                            <div class="card-footer">
                                <div class="ratingindex">
                                    <span class="icon">★</span>
                                </div>
                                <span class=""><strong> {{ number_format($average, 1) }}</strong><span
                                        class="text-muted">({{ $service->ratings->count() }})</span></span>
                            </div>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="h4">Service Not Found</div>
    @endif
</div>
