@extends('product.home');

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header fw-bold bg-primary text-white">
            Create New Product
        </div>
        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name" class="fw-bold">Product Name</label>
                <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror placeholder="Enter Product Name" value="{{old('name')}}">
                @error('name')
                <div class="text-danger" style="font-size: 14px">
                    *{{$message}}
                </div>
                @enderror

                <label for="description" class="fw-bold mt-4">Product Description</label>
                <textarea name="description" rows="3" placeholder="Enter Product Description" class="form-control" @error('description') is-invalid @enderror>{{old('description')}}</textarea>
                @error('description')
                <div class="text-danger" style="font-size: 14px">
                    *{{$message}}
                </div>
                @enderror

                <label for="price" class="fw-bold mt-4">Price</label>
                <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="Enter Product Price" @error('price') is-invalid @enderror>
                @error('price')
                <div class="text-danger" style="font-size: 14px">
                    *{{$message}}
                </div>
                @enderror
                <label for="image" class="fw-bold mt-4">Choose Image : </label>
                <input type="file" name="image" class="" @error('image')

                @enderror/> <br>
                @error('image')
                <div class="text-danger" style="font-size: 14px">
                    *{{$message}}
                </div>
                @enderror

                <label for="category">Choose Category : </label>
                <select name="category_id" id="category_id" class="mt-4">
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>

                <div class="form-check form-switch mt-4">
                    <label for="active" class="form-check-label">Active</label>
                    <input type="checkbox" class="form-check-input" name="status" value="active">
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('products.index')}}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
