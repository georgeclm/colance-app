@extends('layouts.app')
@section('title', 'Add Service - Colance')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="h4">Add Your Service</div>
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name of Service</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputName" value="{{ old('name') }}" aria-describedby="emailHelp"
                            placeholder="Name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="exampleInputPrice" value="{{ old('price') }}" aria-describedby="emailHelp" placeholder="0"
                            required>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDeliveryTime" class="form-label">Delivery Time (Days)</label>
                        <input type="number" name="delivery_time"
                            class="form-control @error('revision_time') is-invalid @enderror" id="exampleInputDeliveryTime"
                            value="{{ old('delivery_time') }}" aria-describedby="emailHelp" placeholder="0" required>
                        @error('delivery_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputRevisionTime" class="form-label">Revision Time</label>
                        <input type="number" name="revision_time"
                            class="form-control @error('revision_time') is-invalid @enderror" id="exampleInputRevisionTime"
                            value="{{ old('revision_time') }}" aria-describedby="emailHelp" placeholder="0" required>
                        @error('revision_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCategory" class="form-label">Category</label>
                        <select name="category_id" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="" selected disabled hidden>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            id="exampleInputDescription" rows=5 aria-describedby="emailHelp" placeholder="Description"
                            required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Service Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            aria-describedby="emailHelp" required value="{{ old('image') }}">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-outline-primary">Upload Service</button>
                </form>

            </div>
        </div>
    </div>
@endsection
