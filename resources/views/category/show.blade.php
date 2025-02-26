@extends('category.home')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header fw-bold bg-primary text-white">
            Category Details
        </div>
        <div class="card-body">
            <label for="name" class="fw-bold mb-2">Category Name</label>
            <p>{{$category['name']}}</p>
            {{-- <div class="form-check form-switch mt-4">
                <label for="active" class="form-check-label">Active</label>
                <input type="checkbox" class="form-check-input" name="status" value="active">
            </div> --}}
        </div>
        <div class="card-footer text-end">
            <a href="{{route('category.list')}}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
        </div>
    </div>
</div>

@endsection

