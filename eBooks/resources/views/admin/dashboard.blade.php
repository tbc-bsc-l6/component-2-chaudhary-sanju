@extends('admin.layouts.app')

@section('title', 'Ebooks - Dashboard')

@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5">
        <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }} </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }} </div>
            @endif
        </div>
            <div class="card-header bg-light">
                <h3 class="h5 pt-2">Dashboard</h3>
            </div>
            <div class="card-body">
                You are logged in !!
            </div>
        </div>
    </div>
@endsection
