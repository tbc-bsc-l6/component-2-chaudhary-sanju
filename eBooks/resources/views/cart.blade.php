@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-header bg-light">
            <div class="row">
                <div class="col-10">
                    <h3 class="h5 pt-2">Products in Cart:</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                @if ($carts->isNotEmpty())
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart->id }}</td>
                            <td>
                                @if ($cart->product->img)
                                    <img src="{{ asset('product/' . $cart->product->img) }}" alt="{{ $cart->product->title }}" class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $cart->product->title }}</td>
                            <td>
                                <!-- Editable qty field with a form -->
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="qty" value="{{ $cart->qty }}" min="1" max="{{ $cart->product->qty }}" class="form-control" style="width: 80px;">
                                    <button type="submit" class="btn btn-sm btn-dark mt-2">Update</button>
                                </form>
                            </td>
                            <td>{{ $cart->product->price }}</td>
                            <td>{{ $cart->qty * $cart->product->price }}</td>
                            <td>{{ \Carbon\Carbon::parse($cart->created_at)->format('d M, Y') }}</td>
                            <td>
                                <a href="#" onclick="deleteCategory({{ $cart->id }});" class="btn btn-danger">Delete</a>
                                <form id="delete-cart-from-{{ $cart->id }}" action="{{ route('cart.destroy', $cart->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No Product found.</td>
                    </tr>
                @endif
            </table>

            <!-- Display Total Quantity and Total Price -->
            <p>Total Qty: {{ $totalQty }} | Total Price: ${{ number_format($totalPrice, 2) }}</p>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $carts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this cart item?')) {
            document.getElementById("delete-cart-from-" + id).submit();
        }
    }
</script>
@endsection
`