{{--
    <h1>Edit</h1>
    <form action="{{route('category.update' ,['id' => $category['id']])}}" method="POST">
        @csrf
        <input type="text" name="name" value="{{$category['name']}}">
        <button type="submit">Update</button>
    </form> --}}


@extends('category.home');

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header fw-bold bg-primary text-white">
            Update Category
        </div>
        <div class="card-body">
            <form action="{{route('category.update' ,['id' => $category['id']])}}" method="POST">
                @csrf
                <label for="name" class="fw-bold">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{$category['name']}}"/>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('category.list')}}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
