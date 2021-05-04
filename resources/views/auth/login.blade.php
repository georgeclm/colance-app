@extends('layouts.app')
@section('title', 'Login - Colance')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <div class="h5 card-title text-center">{{ __('Sign In') }}</div>
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-label-group">
                                <input type="email" id="inputEmail"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email address"
                                    required autofocus name="email" value="{{ old('email') }}">
                                <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                    name="password" required>
                                <label for="inputPassword">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
                                @if (Route::has('password.request'))
                                    <div class="text-end">
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>

                                @endif
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-lg btn-outline-primary text-uppercase"
                                    type="submit">{{ __('Sign In') }}</button>

                                <hr class="my-4">
                                <a class="btn btn-lg btn-google text-uppercase" href="{{ url('auth/google') }}"><i
                                        class="fa fa-google mr-4"></i> {{ __('Sign In With Google') }}</a>
                                <a class="btn btn-lg btn-facebook text-uppercase" href="{{ url('auth/facebook') }}"><i
                                        class="fa fa-facebook-f mr-4"></i> {{ __('Sign In With Facebook') }}</a>
                                <a class="btn btn-lg btn-twitter text-uppercase" href="{{ url('auth/twitter') }}"><i
                                        class="fa fa-twitter mr-4"></i> {{ __('Sign In With Twitter') }}</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
