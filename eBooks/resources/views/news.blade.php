@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8 col-lg-12 ">
                <div class="news_listing_area">
                    <div class="news_lists">
                        <div class="row">

                            @if (!empty($paginatedArticles) && $paginatedArticles->count() > 0)
                                @foreach ($paginatedArticles as $article)
                                    <div class="col-md-3">
                                        <div class="card border-0 p-3 shadow mb-4" style="min-height: 400px;">
                                            <div class="card-body">
                                                <h3 class="border-0 fs-5 pb-2 mb-0" style="height: 150px">{{ $article['title'] }}</h3>
                                                <p style="height: 50px">{{ Str::words(strip_tags($article['description']), 6, '...') }}</p>
                                                <div class="bg-light p-3 border" style="height: 100px">
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-calendar"></i></span>
                                                        <span class="ps-1">{{ $article['publishedAt'] }}</span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-user"></i></span>
                                                        <span class="ps-1">{{ $article['author'] ?? 'Unknown' }}</span>
                                                    </p>
                                                </div>

                                                <div class="d-grid mt-3">
                                                    <a href="{{ $article['url'] }}" class="btn btn-primary btn-lg"
                                                        target="_blank">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    {{ $paginatedArticles->links('pagination::bootstrap-4') }} <!-- Pagination if available -->
                                </div>
                            @else
                                <div class="col-md-12">
                                    News not found
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
