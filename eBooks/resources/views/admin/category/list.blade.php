@extends('admin.layouts.app')

@section('title', 'Ebooks - Dashboard')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }} </div>
        @endif
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">List of Categories:</h3>
                    </div>
                    <div class="col-2">
                        <div>
                            <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="#" onclick="deleteCategory({{ $category->id }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-category-from-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No categories found.</td>
                        </tr>
                    @endif
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>

    <script>
        function deleteCategory(id) {
            if (confirm('Are you sure you want to delete this category?')) {
                document.getElementById("delete-category-from-" + id).submit();
            }
        }
    </script>    

@endsection

