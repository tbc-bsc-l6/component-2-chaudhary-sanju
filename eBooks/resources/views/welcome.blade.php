@extends('layouts.app')

@section('content')
    <div class="background">
        <div class="text-center">
            <p>Dive into a vast library of ebooks, where stories come to life, ideas spark inspiration, and knowledge knows
                no bounds. Whether you're looking for timeless classics, the latest bestsellers, or in-depth guides on any
                topic, our collection has something for everyone.</p>
        </div>
    </div>

    <div class="feature">
        <div class="container my-5">
            <h5>Featured Books</h5>
            <div class="row mt-4">
                @if ($featured_products->isNotEmpty())
                    @foreach ($featured_products as $product)
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
                                        {{-- <a href="{{ route('product.show', $product->id) }}" class="btn btn-info w-100">View Book</a> --}}
                                        <a href="{{ route('addtocart', $product->id) }}"
                                            class="btn btn-primary w-100 mt-3">Add to cart</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </div>
    <div class="feature">
        <div class="container my-5">
            <h5>latest Books</h5>
            <div class="row mt-4">
                @if ($latest_products->isNotEmpty())
                    @foreach ($latest_products as $product)
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
                                        <a href="{{ route('addtocart', $product->id) }}"
                                            class="btn btn-primary w-100 mt-3">Add
                                            to cart</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endsection

<style>
    /* Background Section Styling */
    .background {
        position: relative;
        background-image: url('{{ asset('book.jpg') }}');
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: black;
        opacity: 0.8;
        z-index: 0;
    }

    .background .text-center {
        text-align: center;
        color: white;
        font-size: 1.5rem;
        z-index: 1;
        width: 70%;
    }

    .background .text-center p {
        position: relative;
        z-index: 2;
    }

    /* Feature Section Styling */
    .feature {
        background-color: #f8f9fa;
        padding: 2rem 0;
    }

    .feature h5 {
        font-size: 1.75rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 2rem;
        color: #333;
    }

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

    /* Responsive Design */
    @media (max-width: 768px) {
        .product_card {
            margin-bottom: 1.5rem;
        }

        .background {
            height: 60vh;
        }

        .background .text-center {
            font-size: 1.25rem;
            width: 90%;
        }
    }
</style>
