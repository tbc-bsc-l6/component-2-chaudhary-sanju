@extends('admin.layouts.app')

@section('title', 'Edit Product - Ebooks Dashboard')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <div class="row">
                            <div class="col-11">
                                <h3 class="h5 pt-2">Edit Product:</h3>
                            </div>
                            <div class="col-1">
                                <div>
                                    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" value="{{ old('title', $product->title) }}"
                                    class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                    placeholder="Enter product title" required>
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="author_id" class="form-label">Author</label>
                                <select class="form-control @error('author_id') is-invalid @enderror" id="author_id"
                                    name="author_id" required>
                                    <option value="">Select Author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ old('author_id', $product->author_id) == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    placeholder="Enter product description" required>{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img"
                                    name="img">
                                @error('img')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                @if ($product->img)
                                    <div class="mb-2">
                                        <label>Current Image:</label><br>
                                        <img src="{{ asset('product/' . $product->img) }}" alt="Product Image"
                                            width="200">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="published_at" class="form-label">Published Date</label>
                                <input type="date" value="{{ old('published_at', $product->published_at) }}"
                                    class="form-control @error('published_at') is-invalid @enderror" id="published_at"
                                    name="published_at" required>
                                @error('published_at')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" value="{{ old('price', $product->price) }}"
                                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                    placeholder="Enter product price" required>
                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="featured" class="form-label">Featured</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="featured" name="featured"
                                        value="1" {{ old('featured', $product->featured) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">
                                        Featured
                                    </label>
                                </div>
                                @error('featured')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                        value="active" {{ old('status', $product->status) == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
