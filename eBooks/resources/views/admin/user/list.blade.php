@extends('admin.layouts.app')

@section('title', 'List Users - Ebooks Dashboard')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }} </div>
        @endif
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3 class="h5 pt-2">List of Users:</h3>
                    </div>
                    <div class="col-2">
                        <div>
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Create Users</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @if ($users->isNotEmpty())
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="#" onclick="deleteCategory({{ $user->id }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-user-from-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No users found.</td>
                        </tr>
                    @endif
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>

    <script>
        function deleteCategory(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById("delete-user-from-" + id).submit();
            }
        }
    </script>    

@endsection

