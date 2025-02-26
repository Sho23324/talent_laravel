@extends('product.home')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header fw-bold bg-primary text-white">
            Product Details
        </div>
        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST">
                @csrf
                <label for="name" class="fw-bold">Product Name</label>
                <p>{{$product['name']}}</p>

                <label for="description" class="fw-bold mt-4">Product Description</label>
                <p>{{$product['description']}}</p>


                <label for="price" class="fw-bold mt-4">Price</label>
                <p>{{$product['price']}}</p>
                <div class="form-check form-switch mt-4">
                    <label for="active" class="form-check-label">Active</label>
                    <input type="checkbox" class="form-check-input" name="status" value="active">
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('products.index')}}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection

