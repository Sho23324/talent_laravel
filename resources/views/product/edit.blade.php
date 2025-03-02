@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                Edit Product
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', ['id' => $product['id']]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="fw-bold">Product Name</label>
                    <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror
                        placeholder="Enter Product Name" value="{{ $product['name'] }}">
                    @error('name')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="description" class="fw-bold mt-4">Product Description</label>
                    <textarea name="description" rows="3" placeholder="Enter Product Description" class="form-control"
                        @error('description') is-invalid @enderror>{{ $product['description'] }}</textarea>
                    @error('description')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="price" class="fw-bold mt-4">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product['price'] }}"
                        placeholder="Enter Product Price" @error('price') is-invalid @enderror>
                    @error('price')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="image" class="fw-bold mt-4">Choose Image : </label>
                    <input type="file" name="image" class="" /> <br>

                    <select name="category_id" id="category_id" class="mt-4">
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}"
                                {{ $product['category_id'] == $category['id'] ? 'selected' : '' }}>
                                {{ $category['name'] }}</option>
                        @endforeach
                    </select>
                    <div class="card-body fw-bold">
                        <label for="image" class="form-label">Product Image : </label>
                        <img src="{{ asset('productImage/' . $product['image']) }}" alt="image" width="100px">
                    </div>
                    <div class="form-check form-switch mt-4">
                        @if ($product['status'] == true)
                            <input type="checkbox" class="form-check-input" name="status" value="active" checked>
                        @endif
                        @if ($product['status'] == false)
                            <input type="checkbox" class="form-check-input" name="status" value="active">
                        @endif
                        <label for="active" class="form-check-label">Active</label>
                    </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('products.index') }}" type="submit" class="btn btn-outline-danger fw-bold me-2"
                    style="margin-right: 10px">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Update</button>
            </div>
            </form>
        </div>
    </div>
@endsection
