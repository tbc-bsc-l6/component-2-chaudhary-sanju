<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Author;

class ViewProductController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search_term');
        $categoryId = $request->input('category_id');
        $authorId = $request->input('author_id');

        $products = Product::with(['category', 'author'])
            ->where('status', 'active')  // Only active products
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            })
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->when($authorId, function ($query, $authorId) {
                return $query->where('author_id', $authorId);
            })
            ->paginate(8);

        $categories = Category::where('status', 'active')->get();  // Only active categories
        $authors = Author::where('status', 'active')->get();  // Only active authors

        return view('allProduct', compact('products', 'categories', 'authors', 'searchTerm', 'categoryId', 'authorId'));
    }
}
