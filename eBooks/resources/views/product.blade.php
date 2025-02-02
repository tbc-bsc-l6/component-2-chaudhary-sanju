@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="row my-5">
                <div class="col-md-4">
                    <img src="{{ asset('product/' . $product->img) }}" class="card-img-top" alt="{{ $product->title }}"
                        style="height: auto; width:100%">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <h1>{{ $product->title }}</h1>
                    <p>Description: {{ $product->description }}</p>
                    <h4><strong>Category:</strong> {{ $product->category->name }}</h4>
                    <p>{{ $product->category->description }}</p>
                    <h4><strong>Author:</strong> {{ $product->author->name }}</h4>
                    <p><Strong>Bio:</Strong><br>
                        {{ $product->author->bio }}</p>
                    <p>Publish on {{ $product->published_at }}</p>
                    <h5>Price: {{ $product->price }}</h5>
                    <a href="{{ route('addtocart', $product->id) }}" class="btn btn-primary w-100 mt-3">Add to cart</a>

                </div>
            </div>
        </div>

        <h2>Similar Products</h2>
        <div class="row similar">
            @foreach ($similarProducts as $similarProduct)
                <div class="col-md-3 my-4 product_card">
                    <a href="{{ route('product.show', $similarProduct->id) }}">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('product/' . $similarProduct->img) }}" class="card-img-top"
                            alt="{{ $similarProduct->title }}" style="height: 350px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $similarProduct->title }}</h5>
                            <p class="card-text">{{ Str::limit($similarProduct->description, 100) }}</p>
                            <p><strong>Author:</strong> {{ $similarProduct->author->name }}</p>
                            <p><strong>Category:</strong> {{ $similarProduct->category->name }}</p>
                            <p><strong>Price:</strong> ${{ $similarProduct->price }}</p>
                            <p><strong>Published on:</strong> {{ $similarProduct->published_at }}</p>
                            <a href="{{ route('product.show', $similarProduct->id) }}"
                                class="btn btn-primary w-100 mt-3 text-white">Add to cart</a>
                        </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
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