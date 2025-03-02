@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                Update Category
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', ['id' => $category['id']]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="image" class="fw-bold">Category Image : </label>
                    <img src="{{ asset('categoryImage/' . $category['image']) }}" alt="image" width="60px">
                    <br>
                    <label for="image" class="fw-bold mt-4">Choose Image </label>
                    <input type="file" name="image" class="form-control mb-4" />

                    <label for="name" class="fw-bold">Category Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category['name'] }}" />
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('category.list') }}" type="submit" class="btn btn-outline-danger fw-bold me-2"
                    style="margin-right:10px">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Update</button>
            </div>
            </form>
        </div>
    </div>
@endsection
