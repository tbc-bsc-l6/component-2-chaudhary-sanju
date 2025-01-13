@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Products</h1>

        <form method="GET" action="{{ route('products.index') }}" class="my-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search_term" class="form-control" placeholder="Search..."
                        value="{{ old('search_term', $searchTerm) }}">
                </div>
                <div class="col-md-3">
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id', $categoryId) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="author_id" class="form-control">
                        <option value="">Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ $author->id == old('author_id', $authorId) ? 'selected' : '' }}>
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

        @if ($products->count() > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4 product_card">
                        <a href="{{ route('product.show', $product->id) }}">
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
                                    <a href="{{ route('addtocart', $product->id) }}" class="btn btn-primary w-100 mt-3">Add
                                        to cart</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        @else
            <p>No products found matching your criteria.</p>
        @endif
    </div>
@endsection


<style>
    /* Product Card Styling */
    .product_card .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }

    .product_card .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .product_card img {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        object-fit: cover;
    }

    .product_card .card-body {
        padding: 1rem;
        color: #555;
    }

    .product_card .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #222;
        min-height: 50px;
    }

    .product_card .card-text {
        font-size: 0.85rem;
        color: #666;
    }

    /* Links Styling */
    .product_card a {
        text-decoration: none;
    }

    .product_card a:hover {
        text-decoration: none;
    }

    .product_card p {
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 0.5rem;
        color: #666;
        fo
    }

    .product_card p strong {
        font-weight: bold;
        color: #444;
    }

    /* Button Styling */
    .product_card .btn-primary {
        background-color: #007bff;
        border: none;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .product_card .btn-primary:hover {
        background-color: #0056b3;
    }

</style>