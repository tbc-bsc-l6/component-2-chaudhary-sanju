@extends('admin.layouts.app')

@section('title', 'Ebooks - Dashboard')

@section('content')
    <div class="container">
        <div class="row mt-4">
            @if (Session::has('success'))
                <div class="alert alert-success w-100">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger w-100">{{ Session::get('error') }}</div>
            @endif

            <!-- Orders Card -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">
                        <h5>Orders</h5>
                    </div>
                    <div class="card-body">
                        <p class="fs-5">Total Orders: {{ $totalOrders }}</p>
                        <p class="fs-5">Confirmed Orders: {{ $confirmedOrders }}</p>
                        <p class="fs-5">Pending Orders: {{ $pendingOrders }}</p>
                    </div>
                </div>
            </div>

            <!-- Products Card -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header bg-success text-white">
                        <h5>Products</h5>
                    </div>
                    <div class="card-body">
                        <p class="fs-5">Total Products: {{ $totalProducts }}</p>
                        <p class="fs-5">Active Products: {{ $activeProducts }}</p>
                        <p class="fs-5">Inactive Products: {{ $inactiveProducts }}</p>
                    </div>
                </div>
            </div>

            <!-- Categories Card -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header bg-warning text-white">
                        <h5>Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="fs-5">Total Categories: {{ $totalCategories }}</p>
                        <p class="fs-5">Active Categories: {{ $activeCategories }}</p>
                        <p class="fs-5">Inactive Categories: {{ $inactiveCategories }}</p>
                    </div>
                </div>
            </div>

            <!-- Authors Card -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header bg-info text-white">
                        <h5>Authors</h5>
                    </div>
                    <div class="card-body">
                        <p class="fs-5">Total Authors: {{ $totalAuthors }}</p>
                        <p class="fs-5">Active Authors: {{ $activeAuthors }}</p>
                        <p class="fs-5">Inactive Authors: {{ $inactiveAuthors }}</p>
                    </div>
                </div>
            </div>

            <!-- Customers Card -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header bg-danger text-white">
                        <h5>Customers</h5>
                    </div>
                    <div class="card-body">
                        <p class="fs-5">Total Customers: {{ $totalCustomers }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
