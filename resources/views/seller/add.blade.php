@extends('layouts.app')
@section('title', 'Seller - Colance')
@section('content')

    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="h4">Seller Profile</div>
                <form action="{{ route('sellers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Seller Name</label>
                        <input type="text" name="sellername" class="form-control @error('sellername')is-invalid @enderror"
                            id="exampleInputName" value="{{ old('sellername') }}" aria-describedby="emailHelp"
                            placeholder="Name" required>
                        @error('sellername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control @error('address')is-invalid @enderror"
                            id="exampleInputAddress" value="{{ old('address') }}" aria-describedby="emailHelp"
                            placeholder="Domicili" required>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUrl" class="form-label">Website Link</label>
                        <input type="text" name="url" class="form-control @error('url')is-invalid @enderror"
                            id="exampleInputUrl" aria-describedby="emailHelp" value="{{ old('url') }}"
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
                            name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Seller Picture</label>
                        <input type="file" class="form-control @error('image')is-invalid @enderror" name="image"
                            value="{{ old('image') }}" aria-describedby="emailHelp">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-success">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection
