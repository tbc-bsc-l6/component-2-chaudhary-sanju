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
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
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
