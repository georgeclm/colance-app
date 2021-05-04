@extends('layouts.app')
@section('title', 'Edit Seller Profile - Colance')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="h4">Edit your Seller Profile</div>
                <form action="{{ route('sellers.update', $seller) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name of seller</label>
                        <input type="text" name="sellername" class="form-control @error('sellername')is-invalid @enderror"
                            id="exampleInputName" value="{{ old('sellername') ?? $seller->sellername }}"
                            aria-describedby="emailHelp" placeholder="Name">
                        @error('sellername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control @error('address')is-invalid @enderror"
                            id="exampleInputEmail1" value="{{ old('address') ?? $seller->address }}"
                            aria-describedby="emailHelp" placeholder="Domicili">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputWebsite" class="form-label">Website Link</label>
                        <input type="text" name="url" class="form-control @error('url')is-invalid @enderror"
                            id="exampleInputWebsite" value="{{ old('url') ?? $seller->url }}" aria-describedby="emailHelp"
                            placeholder="Website">
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description of You</label>
                        <textarea class="form-control @error('description')is-invalid @enderror"
                            id="exampleFormControlTextarea1" rows="3"
                            name="description">{{ old('description') ?? $seller->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Seller Image</label>
                        <input type="file" name="image"
                            class="form-control @error('image')
                                                                                                        is-invalid @enderror" id="exampleInputEmail1"
                            value="{{ old('image') }}" aria-describedby="emailHelp">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Update Profile</button>
                </form>

            </div>
        </div>
    </div>
@endsection
