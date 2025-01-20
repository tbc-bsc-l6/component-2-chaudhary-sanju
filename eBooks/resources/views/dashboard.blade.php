
@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="card-body">
            <div class="col-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }} </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }} </div>
                @endif
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 mt-5">
                        <div class="card border-0 shadow-lg">
                            <div class="card-header bg-dark text-white">
                            </div>
                            <div class="card-body">

                                <form action="{{ route('customer.profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" value="{{ old('name', $user->name) }}"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" placeholder="Enter your name" required>
                                        @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" value="{{ old('email', $user->email) }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Enter your email" disabled required>
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password (to change
                                            password)</label>
                                        <input type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            id="current_password" name="current_password"
                                            placeholder="Enter current password">
                                        @error('current_password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Enter new password">
                                        @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm New
                                            Password</label>
                                        <input type="password"
                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                            id="confirm_password" name="password_confirmation"
                                            placeholder="Confirm new password">
                                        @error('confirm_password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
