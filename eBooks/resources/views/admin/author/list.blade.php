@extends('admin.layouts.app')

@section('title', 'List Author - Ebooks Dashboard')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }} </div>
        @endif
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">List of Authors:</h3>
                    </div>
                    <div class="col-2">
                        <div>
                            <a href="{{ route('author.create') }}" class="btn btn-primary">Create Author</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Bio</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @if ($authors->isNotEmpty())
                        @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->bio }}</td>
                                <td>{{ $author->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($author->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('author.edit', $author->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="#" onclick="deleteCategory({{ $author->id }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-author-from-{{ $author->id }}" action="{{ route('author.destroy', $author->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No authors found.</td>
                        </tr>
                    @endif
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $authors->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>

    <script>
        function deleteCategory(id) {
            if (confirm('Are you sure you want to delete this author?')) {
                document.getElementById("delete-author-from-" + id).submit();
            }
        }
    </script>    

@endsection

