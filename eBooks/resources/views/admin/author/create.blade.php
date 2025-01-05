@extends('admin.layouts.app')

@section('title', 'Create Author - Ebooks Dashboard')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <div class="row">
                            <div class="col-11">
                                <h3 class="h5 pt-2">Create Author:</h3>
                            </div>
                            <div class="col-1">
                                <div>
                                    <a href="{{ route('author.index') }}" class="btn btn-primary">Back</a>
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('author.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                    placeholder="Enter author name" required>
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio"
                                    placeholder="Enter author bio" required>{{ old('bio') }}</textarea>
                                @error('bio')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                        value="active" {{ old('status') == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Create Author</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
