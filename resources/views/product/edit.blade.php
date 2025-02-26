    {{-- <h1>Edit Product</h1>
    <form action="{{route('products.update', ['id'=>$product['id']])}}" method="POST">
        @csrf
        Name : <input type="text" name="name" value="{{$product['name']}}"><br>
        Description : <input type="text" name="description" value="{{$product['description']}}"><br>
        Price : <input type="text" name="price" value="{{$product['price']}}"><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{route('products.index')}}">Back</a> --}}
@extends('product.home');

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header fw-bold bg-primary text-white">
            Edit Product
        </div>
        <div class="card-body">
            <form action="{{route('products.update', ['id'=>$product['id']])}}" method="POST">
                @csrf
                <label for="name" class="fw-bold">Product Name</label>
                <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror placeholder="Enter Product Name" value="{{$product['name']}}">
                @error('name')
                <div class="text-danger" style="font-size: 12px">
                    *{{$message}}
                </div>
                @enderror

                <label for="description" class="fw-bold mt-4">Product Description</label>
                <textarea name="description" rows="3" placeholder="Enter Product Description" class="form-control" @error('description') is-invalid @enderror>{{$product['description']}}</textarea>
                @error('description')
                <div class="text-danger" style="font-size: 12px">
                    *{{$message}}
                </div>
                @enderror

                <label for="price" class="fw-bold mt-4">Price</label>
                <input type="text" name="price" class="form-control" value="{{$product['price']}}" placeholder="Enter Product Price" @error('price') is-invalid @enderror>
                @error('price')
                <div class="text-danger" style="font-size: 12px">
                    *{{$message}}
                </div>
                @enderror
                <div class="form-check form-switch mt-4">
                    <label for="active" class="form-check-label">Active</label>
                    <input type="checkbox" class="form-check-input" name="status" value="active">
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('products.index')}}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

