@extends('product.home')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header fw-bold bg-primary text-white">
            Product Details
        </div>
        <div class="card-body">
            <label for="name" class="fw-bold form-label">Product Name</label>
            <input type="text" class="form-control" value="{{$product['name']}}" readonly/>
        </div>
        <div class="card-body">
            <label for="description" class="fw-bold mt-4 form-label">Product Description</label>
            <input type="text" class="form-control" value="{{$product['description']}}" readonly/>
        </div>

        <div class="card-body">
            <label for="price" class="fw-bold mt-4 form-label">Price</label>
            <input type="text" class="form-control" value="{{$product['price']}}" readonly/>
        </div>
        <div class="card-body">
            <label for="category_id" class="fw-bold mt-4 form-label">Category : </label>
            <select name="category_id" id="category_id" class="mt-4">
                @foreach($categories as $category)
                <option value="{{$category['id']}}" {{$product['category_id'] == $category['id'] ? 'selected' : ''}}>{{$category['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="card-body fw-bold">
            <label for="image" class="form-label">Product Image : </label>
            <img src="{{asset('productImage/'.$product['image'])}}" alt="image" width="100px">
        </div>
        <div class="card-body fw-bold">
            <div class="form-check form-switch mt-4">
                <label for="active" class="form-check-label">Active</label>
                @if($product['status'] == true)
                <input type="checkbox" class="form-check-input" name="status" value="active" checked>
                @endif
                @if($product['status'] == false)
                <input type="checkbox" class="form-check-input" name="status" value="active">
                @endif
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{route('products.index')}}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
        </div>
    </div>
</div>

@endsection

