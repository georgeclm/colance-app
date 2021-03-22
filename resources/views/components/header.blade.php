<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top border-bottom border-light border-5">
        <div class="container-fluid" style="width:95%">
            <a class="navbar-brand" href="{{ route('services.index') }}">
                <img src="{{ asset('img/Logo_text.png') }}" alt="" width="90" height="" class="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link @if ($home) active @endif"
                            aria-current="page" href="/">Home</a>
                    </li> --}}
                    @php
                        use App\Models\User;
                        $order = false;
                        $wishlist = false;
                        $order = false;
                        if (auth()->user()) {
                            if (auth()->user()->seller) {
                                $this->hasSeller = true;
                            } else {
                                $hasSeller = false;
                            }
                        }
                        $chat = false;
                        $categories = User::categories();

                    @endphp
                    @auth
                        <li class="nav-item">
                            <a class="nav-link @if ($order) active @endif"
                                href="{{ route('orders.index', auth()->user()) }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($chat) active @endif"
                                href="/messages">Message @include('messenger.unread-count')</a>

                        </li>

                        {{-- <li><a href="/messages">Messages @include('messenger.unread-count')</a></li>
                        <li><a href="/messages/create">Create New Message</a></li> --}}
                    @endauth


                </ul>
                <div class="col-md-6 text-center">

                    <form action="/search" class="d-flex container-fluid" autocomplete="off">
                        <input class="typeahead form-control me-2" type="text" placeholder="Find Services" name="query">
                        {{-- <input class="form-control me-2" name="query" type="search" placeholder="Find Services"
                            aria-label="Search"> --}}
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                </div>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link @if ($wishlist) active @endif" href="{{ route('wishlists.show') }}"> <span
                                    class="badge badge-pill bg-danger">{{ auth()->user()->favorite->count() }}</span>
                                Wishlist</a>
                        </li>
                        @if ($hasSeller)
                            <li class="nav-item">
                                <a class="nav-link text-success"
                                    href="{{ route('sellers.show', auth()->user()->seller) }}">Switch To
                                    Selling</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-success" href="{{ route('sellers.create') }}">Become a seller</a>
                            </li>

                        @endif

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item"
                                        href="{{ route('profiles.edit', auth()->user()) }}">Profile</a>
                                </li>

                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-white">
        <div class="container d-flex w-100 h-100 p-1 mx-auto flex-column border-bottom border-light border-5">
            <header class="mb-auto">
                <div>
                    <nav class="nav nav-masthead justify-content-center float-md-start">
                        @foreach ($categories as $category)
                            <a class="nav-link"
                                href="{{ route('search.category', $category->id) }}">{{ $category->name }}</a>
                        @endforeach

                    </nav>
                </div>
            </header>
        </div>
    </div>
</div>
