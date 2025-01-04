@extends('admin.layouts.app')

@section('title', 'Ebooks - Dashboard')

@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <h3 class="h5 pt-2">Dashboard</h3>

            </div>
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }} </div>
            @endif
            <div class="card-body">
                List of categories
            </div>
        </div>
    </div>
@endsection
