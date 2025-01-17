<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalOrders = Order::count();
        $confirmedOrders = Order::where('status', 'confirm')->count();
        $pendingOrders = $totalOrders - $confirmedOrders;

        // Products
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count(); // Assuming `status` column exists
        $inactiveProducts = $totalProducts - $activeProducts;

        // Categories
        $totalCategories = Category::count();
        $activeCategories = Category::where('status', 'active')->count(); // Assuming `status` column exists
        $inactiveCategories = $totalCategories - $activeCategories;

        // Authors
        $totalAuthors = Author::count();
        $activeAuthors = Author::where('status', 'active')->count(); // Assuming `status` column exists
        $inactiveAuthors = $totalAuthors - $activeAuthors;

        // Customers
        $totalCustomers = User::where('role', 'customer')->count();

        // Passing the counts to the view
        return view('admin.dashboard', compact(
            'totalOrders',
            'confirmedOrders',
            'pendingOrders',
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'totalCategories',
            'activeCategories',
            'inactiveCategories',
            'totalAuthors',
            'activeAuthors',
            'inactiveAuthors',
            'totalCustomers'
        ));
    }
}
