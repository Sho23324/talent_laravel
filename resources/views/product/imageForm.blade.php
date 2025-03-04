@extends('layouts.master');

@section('content')
    <div class="container mt-5" style="margin-left: 20%">
        <form action="{{ route('products.storeImg', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Add Image
                </div>
                <div class="card-body">
                    <input type="hidden" name="product_id" value="{{ $product->id }}"><br>
                    <input type="file" name="image"><br>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-danger mt-3"
                        style="margin-right: 10px">Back</a>
                    <input type="submit" class="mt-3 btn btn-outline-primary">
                </div>

            </div>
        </form>
        <div class="card">
            <div class="card-header">
                Images
            </div>
            <div class="card-body d-flex">
                @foreach ($productImages->images as $pimage)
                    <div class="shadow p-4" style="margin-right: 20px">
                        <div class="">
                            <img src="{{ asset('productImage/' . $pimage['image']) }}" alt="" width="80px">
                        </div>
                        <div class="text-center mt-2">
                            <form action="{{ route('products.deleteImg', ['id' => $pimage['id']]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
