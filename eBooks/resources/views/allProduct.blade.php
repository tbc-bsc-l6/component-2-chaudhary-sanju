@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Products</h1>

        <form method="GET" action="{{ route('products.index') }}" class="my-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search_term" class="form-control" placeholder="Search..." value="{{ old('search_term', $searchTerm) }}">
                </div>
                <div class="col-md-3">
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $categoryId) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="author_id" class="form-control">
                        <option value="">Select Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == old('author_id', $authorId) ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary ">Search</button>
                </div>
            </div>
        </form>

        @if($products->count() > 0)
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('product/' . $product->img) }}" class="card-img-top"
                            alt="{{ $product->title }}" style="height: 350px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p><strong>Author:</strong> {{ $product->author->name }}</p>
                            <p><strong>Category:</strong> {{ $product->category->name }}</p>
                            <p><strong>Price:</strong> ${{ $product->price }}</p>
                            <p><strong>Published on:</strong> {{ $product->published_at }}</p>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info w-100">View Book</a>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary w-100 mt-3">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p>No products found matching your criteria.</p>
        @endif
    </div>
@endsection
