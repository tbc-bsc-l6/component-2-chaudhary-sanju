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
        <div class="row">
            @foreach ($similarProducts as $similarProduct)
                <div class="col-md-3 my-4 ">
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
                            <a href="{{ route('product.show', $similarProduct->id) }}" class="btn btn-info w-100">View
                                Book</a>
                            <a href="{{ route('product.show', $similarProduct->id) }}"
                                class="btn btn-primary w-100 mt-3 text-white">Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
