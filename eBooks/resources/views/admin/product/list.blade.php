@extends('admin.layouts.app')

@section('title', 'List Product - Ebooks Dashboard')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">List of Products:</h3>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Published At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if ($product->img)
                                            <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->title }}" class="img-thumbnail" style="max-width: 100px;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->author->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                                    <td>{{ ucfirst($product->status) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->published_at)->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-dark">Edit</a>
                                        <a href="#" onclick="deleteProduct({{ $product->id }});" class="btn btn-danger">Delete</a>
                                        <form id="delete-product-form-{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById("delete-product-form-" + id).submit();
            }
        }
    </script>
@endsection