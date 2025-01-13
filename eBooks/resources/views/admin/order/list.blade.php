@extends('admin.layouts.app')

@section('title', 'List Order - Ebooks Dashboard')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">List of Order Products:</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Product Title</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->isNotEmpty())
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->product->title }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>$ {{ $order->product->price }}</td>
                                    <td>$ {{ $order->qty * $order->product->price }}</td>
                                    <td>
                                        <span
                                            class="badge 
                                            @if ($order->status === 'confirm') bg-success 
                                            @elseif ($order->status === 'pending') bg-warning 
                                            @else bg-secondary @endif">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                        <form action="{{ route('orders.confirm', $order->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Mark as Confirm</button>
                                        </form>
                                        @else
                                            <button type="button" class="btn btn-dark" disabled>Order Confirmed</button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">No products found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

@endsection
