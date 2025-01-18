<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class FrontProductController extends Controller
{

    /**
     * Display the latest products on a view.
     *
     */
    public function index()
    {
        $latest_products = Product::with(['author', 'category'])
            ->where('featured', false)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit(4) // Fetch the latest 4 products
            ->get();

        $featured_products = Product::with(['author', 'category'])
            ->where('featured', true)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit(4) // Fetch the featured 4 products
            ->get();

        return view('welcome', compact('latest_products', 'featured_products'));
    }

    public function show($id)
    {
        // Fetch the product by ID along with its category and author using eager loading
        $product = Product::with(['category', 'author'])->findOrFail($id);

        // Fetch similar products (same category, different ID), along with their category and author
        $similarProducts = Product::with(['category', 'author'])
            ->where('status', 'active')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4) // Limit to 4 similar products
            ->get();

        // Return the data to the Blade view
        return view('product', compact('product', 'similarProducts'));
    }
}
