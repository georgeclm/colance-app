@extends('layouts.app')
@section('title', 'Edit Service - Colance')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="h4">Edit your Gig</div>
                <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name of Service</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputEmail1" value="{{ old('name') ?? $service->name }}"
                            aria-describedby="emailHelp" placeholder="Name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="exampleInputEmail1" value="{{ old('price') ?? $service->price }}"
                            aria-describedby="emailHelp" placeholder="0" required>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Delivery Time (Days)</label>
                        <input type="number" name="delivery_time"
                            class="form-control @error('delivery_time') is-invalid @enderror" id="exampleInputEmail1"
                            value="{{ old('delivery_time') ?? $service->delivery_time }}" aria-describedby="emailHelp"
                            placeholder="0" required>
                        @error('delivery_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Revision Time</label>
                        <input type="number" name="revision_time"
                            class="form-control @error('revision_time') is-invalid @enderror" id="exampleInputEmail1"
                            value="{{ old('revision_time') ?? $service->revision_time }}" aria-describedby="emailHelp"
                            placeholder="0" required>
                        @error('revision_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputCategory" class="form-label">Category</label>
                        <select name="category_id" class="form-select @error('category') is-invalid @enderror" disabled>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($service->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-muted">
                            Category cannot be changed
                        </span>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            id="exampleInputEmail1" rows=5 value="{{ old('description') ?? $service->description }}"
                            aria-describedby="emailHelp" placeholder="Description"
                            required>{{ old('description') ?? $service->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Service Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            id="exampleInputEmail1" value="{{ old('image') }}" aria-describedby="emailHelp">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Update Service</button>
                </form>

            </div>
        </div>
    </div>
@endsection
