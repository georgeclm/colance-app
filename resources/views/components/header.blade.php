<div>
    <nav class="navbar navbar-expand-md navbar-light sticky-top border-bottom border-light border-5"
        style="background-color: #87CEEB">
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
                    @php
                        use App\Models\User;
                        $order = false;
                        $wishlist = false;
                        $chat = false;
                        $role = false;
                        $user = false;
                        if (url()->current() == env('APP_URL') . '/wishlists') {
                            $wishlist = true;
                        } elseif (url()->current() == env('APP_URL') . '/orders/' . auth()->id()) {
                            $order = true;
                        } elseif (url()->current() == env('APP_URL') . '/messages') {
                            $chat = true;
                        } elseif (url()->current() == env('APP_URL') . '/roles') {
                            $role = true;
                        } elseif (url()->current() == env('APP_URL') . '/users') {
                            $user = true;
                        }
                        $categories = User::categories();

                    @endphp
                    @auth
                        @if (auth()->user()->roles->first() != null &&
        auth()->user()->roles->first()->name == 'Admin')
                            <li class="nav-item">
                                <a class="nav-link @if ($role) active @endif" href="{{ route('roles.index') }}">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($user) active @endif" href="{{ route('users.index') }}">Manage Users</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link @if ($order) active @endif" href="{{ route('orders.index', auth()->user()) }}">{{ __('lang.orders') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($chat) active @endif" href="{{ route('messages') }}">{{ __('lang.message') }}
                                    @include('messenger.unread-count')</a>
                            </li>
                        @endif

                    @endauth

                </ul>
                <div class="col-md-5 text-center">
                    <form action="{{ route('search') }}" class="d-flex container-fluid" autocomplete="off">
                        <input class="typeahead form-control me-2" type="text" placeholder="Find Services" name="query">
                        <button class="btn btn-success" type="submit">{{ __('lang.search') }}</button>
                    </form>

                </div>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link me-3" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-success" style="padding: 1px 10px;"><a class="nav-link" href="{{ route('register') }}">{{ __('Join') }}</a></button>
                        </li>

                    @else
                        @if (auth()->user()->roles->first() != null &&
        auth()->user()->roles->first()->name == 'Admin')
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                @if (app()->getLocale() == 'id') Indonesia @else
                                        English @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('language', 'id') }}">Indonesia</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('language', 'en') }}">English</a>
                                    </li>

                                </ul>
                            <li class="nav-item">
                                <a class="nav-link @if ($wishlist) active @endif" href="{{ route('wishlists.show') }}"> <span
                                        class="badge badge-pill bg-danger">{{ auth()->user()->favorite->count() }}</span>
                                    {{ __('lang.wishlist') }}</a>
                            </li>
                            @if (auth()->user()->seller)
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #1f157a"
                                        href="{{ route('sellers.show', auth()->user()->seller) }}">{{ __('lang.switchtoselling') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #1f157a"
                                        href="{{ route('sellers.create') }}">Become a
                                        seller</a>
                                </li>

                            @endif
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item"
                                        href="{{ route('profiles.edit', auth()->user()) }}">{{ __('lang.profile') }}</a>
                                </li>

                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('lang.logout') }}
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
