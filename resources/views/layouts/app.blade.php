<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/Logo.png') }}" />

    <title>@yield('title')</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script script src="{{ asset('js/app.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
</head>

<body>
    <x-header />
    <div id="app">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                <ul>
                    <h6>{{ session('success') }}</h6>
                </ul>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    @yield('home')
    <x-footer />

</body>
<script>
    var path = "{{ route('autocomplete') }}";

    $('input.typeahead').typeahead({
        source: function(query, process) {
            return $.get(path, {
                query: query
            }, function(data) {
                return process(data);
            });
        }
    });
    $(function() {
        $('div.fadeshop').hover(
            function() {
                $(this).find('div.captionshop').fadeIn(150);
            },
            function() {
                $(this).find('div.captionshop').fadeOut(150);
            }
        );
    });

</script>
<style>
    a:hover {
        text-decoration: none;
    }

    img {
        max-width: 100%;
    }

    /*Product Box*/
    .maxproduct {
        max-height: 300px;
        overflow: hidden;
        display: inline-block;
    }

    .productbox {
        background: #fff;
        padding: 13px;
        border: 1px solid #e4e4e4;
        margin-bottom: 30px;
    }

    .productbox h1 {
        display: block;
        font-size: 17px;
        text-transform: uppercase;
        margin-top: 15px;
        border-bottom: double medium #eee;
        padding-bottom: 15px;
        margin-bottom: 10px;
        font-weight: 500;
        color: #333;
    }

    .productbox .price {
        font-weight: 400;
    }

    .shopsection .productbox {
        margin-bottom: 30px;
    }

    .fadeshop {
        position: relative;
        max-height: 300px;
    }

    .captionshop {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        background-color: #00bba7;
        width: 100%;
        height: 100%;
    }



    .captionshop h3,
    .captionshop p {
        color: #fff;
        margin: 20px;
    }

    .captionshop h3 {
        margin: 30px 20px 10px;
    }

    .captionshop p {
        font-size: 15px;
        margin: 0 20px 15px;
    }

    .captionshop a.learn-more {
        padding: 8px 12px;
        background: transparent;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        border: 1px solid;
        display: inline-block;
        min-width: 120px;
        text-transform: uppercase;
        font-size: 16px;
    }

    .captionshop a.learn-more.detailslearn {
        margin-left: -1px;
    }

    .captionshop a.learn-more:hover {
        background: #fff;
        color: #00bba7;
        display: inline-block;
        border: 1px solid #fff;
    }

    .product-details {
        padding: 6px 0 0 0;
        text-align: center;
        color: #444;
    }


    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
    }

    .card-signin {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signin .card-body {
        padding: 2rem;
    }

    .form-signin {
        width: 100%;
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group input {
        height: auto;
        border-radius: 2rem;
    }

    .form-label-group>input,
    .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x);
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
    }

    .btn-google {
        color: white;
        background-color: #ea4335;
    }

    .btn-twitter {
        color: white;
        background-color: #6ca0ca;
    }


    .btn-facebook {
        color: white;
        background-color: #3b5998;
    }

    /* Fallback for Edge
-------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
        .form-label-group>label {
            display: none;
        }

        .form-label-group input::-ms-input-placeholder {
            color: #777;
        }
    }

    /* Fallback for IE
-------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
        .form-label-group>label {
            display: none;
        }

        .form-label-group input:-ms-input-placeholder {
            color: #777;
        }
    }

    /*
 * Globals
 */


    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
        color: rgb(29, 28, 28);
        text-shadow: none;
        /* Prevent inheritance from `body` */
    }


    /*
 * Base structure
 */

    body {
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .cover-container {
        max-width: 42em;
    }


    /*
 * Header
 */

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(0, 0, 0, 0.5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(0, 0, 0, 0.103);
    }

    .nav-masthead .nav-link+.nav-link {
        margin-left: 1rem;
    }

    .nav-masthead .active {
        color: rgb(0, 0, 0);
        border-bottom-color: rgb(0, 0, 0);
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    input[type='radio'] {
        transform: scale(2);
    }

    input[type=radio]+label::before {
        content: '';
        display: inline-block;
        margin: 0 0.5rem;
    }

    .custom-login {
        height: 500px;
        padding-top: 100px;
    }

    img.slider-img {
        height: 400px !important;
    }

    .custom-product {
        height: 600px;
    }

    .slider-text {
        background-color: #5c6d5c4a;
    }

    img.trending-image {
        height: 100px;
    }

    img.trending-image-search {
        height: 250px;
    }

    .trending-item {
        float: left;
        width: 20%;
    }

    .trending-wrapper {
        margin: 30px;
    }

    img.detail-img {
        height: 400px;
    }

    .search-box {
        width: 500px !important;
    }

    .cart-list-divider {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }

    .link-web a {
        color: #000;
        text-decoration: none;
        transition: color 0.5s;
    }

    .link-web a:hover {
        transition: 1s;
        border-bottom: 0px;
        color: #646786;

    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    /* Rating */
    .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 50px;
    }

    .ratingindex {
        display: inline-block;
        position: relative;
        height: 20px;
        line-height: 20px;
        font-size: 20px;
    }

    .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
    }

    .rating label:last-child {
        position: static;
    }

    .rating label:nth-child(1) {
        z-index: 5;
    }

    .rating label:nth-child(2) {
        z-index: 4;
    }

    .rating label:nth-child(3) {
        z-index: 3;
    }

    .rating label:nth-child(4) {
        z-index: 2;
    }

    .rating label:nth-child(5) {
        z-index: 1;
    }

    .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .rating label .icon {
        float: left;
        color: transparent;
    }

    .rating label:last-child .icon {
        color: #000;
    }

    .rating:not(:hover) label input:checked~.icon,
    .rating:hover label:hover input~.icon {
        color: #09f;
    }

    .rating label input:focus:not(:checked)~.icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #09f;
    }

    .heading {
        font-size: 25px;
        margin-right: 25px;
    }

    .fa {
        font-size: 25px;
    }

    .fb {
        font-size: 15px;
    }

    .checked {
        color: orange;
    }

    /* Three column layout */
    .side {
        float: left;
        width: 15%;
        margin-top: 10px;
    }

    .middle {
        float: left;
        width: 70%;
        margin-top: 10px;
    }

    /* Place text to the right */
    .right {
        text-align: right;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }



    /* Responsive layout - make the columns stack on top of each other instead of next to each other */
    @media (max-width: 400px) {

        .side,
        .middle {
            width: 100%;
        }

        /* Hide the right column on small screens */
        .right {
            display: none;
        }
    }

</style>

</html>
