<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class NewsController extends Controller
{
    public function index()
    {
        $apiKey = '417d365c45b549388a9b1e4688aa147a';
        $url = 'https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=417d365c45b549388a9b1e4688aa147a';
        
        $response = Http::withOptions([
            'verify' => false,
        ])->get($url
        );
        

        $articles = $response->json()['articles'] ?? [];

    // Paginate the articles (10 per page)
    $perPage = 12;
    $currentPage = request()->get('page', 1); // Get current page from the request
    $offset = ($currentPage - 1) * $perPage;

    $paginatedArticles = new LengthAwarePaginator(
        array_slice($articles, $offset, $perPage), // Slice the articles array for the current page
        count($articles), // Total number of articles
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()] // Maintain query string
    );

    return view('news', compact('paginatedArticles'));
}
}
