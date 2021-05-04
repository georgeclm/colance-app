@extends('layouts.app')
@section('title', "{$user->name} - Colance")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="h4">Your Profile</div>
                <form action="{{ route('profiles.update', $user) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                            id="exampleInputEmail1" value="{{ old('name') ?? $user->name }}" aria-describedby="emailHelp"
                            placeholder="Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                            value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Email" disabled>

                    </div>


                    <input type="submit" class="btn btn-outline-primary" value="Save" />
                </form>

            </div>
        </div>
    </div>

@endsection
