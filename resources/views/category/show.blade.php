@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                Category Details
            </div>
            <div class="card-body">
                <label for="image" class="fw-bold">Category Image : </label>
                <img src="{{ asset('categoryImage/' . $category['image']) }}" alt="image" width="60px"><br>
            </div>
            <div class="card-body">
                <label for="name" class="fw-bold mb-2">Category Name</label>
                <input type="text" class="form-control" value="{{ $category['name'] }}" readonly>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('category.list') }}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
            </div>
        </div>
    </div>
@endsection
