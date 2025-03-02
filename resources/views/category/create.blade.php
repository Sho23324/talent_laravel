@extends('layouts.master');

@section('content')
    <div class="container mt-5" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                Create New Category
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="image" class="form-label">Choose Image : </label>
                    <input type="file" class="form-control" name="image" @error('image')

                @enderror>
                    @error('image')
                        <div class="text-danger" style="font-size: 14px;">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="name" class="fw-bold mt-4">Category Name</label>
                    <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror
                        placeholder="Enter Product Name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger" style="font-size: 14px">
                            *{{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('category.list') }}" type="submit" class="btn btn-outline-danger fw-bold me-2"
                    style="margin-right: 10px">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Create</button>
            </div>
            </form>
        </div>
    </div>
@endsection
