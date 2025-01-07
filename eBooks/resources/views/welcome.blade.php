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
                                <a href="{{ route('addtocart', $product->id) }}" class="btn btn-primary w-100 mt-3">Add to cart</a>
                            </div>
                        </div>
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
                                <a href="{{ route('addtocart', $product->id) }}" class="btn btn-primary w-100 mt-3">Add to cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
@endsection

<style>
    .background {
        position: relative;
        background-image: url('{{ asset('book.jpg') }}');
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 80vh;
        /* Adjust height as needed */
        opacity: .9;
        /* 90% opacity */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .text-center {
        text-align: center;
        color: white;
        /* Change color as needed for contrast */
        font-size: 1.5rem;
        /* Adjust font size as needed */
        z-index: 1;
        width: 70%;
    }

    .background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: black;
        /* Adjust background overlay color if needed */
        opacity: 0.9;
        /* Overlay opacity */
        z-index: 0;
    }

    .text-center p {
        position: relative;
        z-index: 2;
    }
</style>
