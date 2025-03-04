@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <h1>Product Lists</h1>
        @can('productCreate')
            <a href="{{ route('products.create') }}" class="btn btn-outline-primary mt-4 mb-4 fw-bold">
                <i class="fa-solid fa-square-plus"></i> Create Product
            </a>
        @endcan
        <div class="">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">NAME</th>
                        <th class="bg-primary text-white">DESCRIPTION</th>
                        <th class="bg-primary text-white">PRICE</th>
                        <th class="bg-primary text-white">Image</th>
                        @can('categoryUpdate')
                            <th class="bg-primary text-white">STATUS</th>
                        @endcan
                        <th class="bg-primary text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>
                                <form action="{{ route('products.imgForm', ['id' => $product['id']]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary">+ image</button>
                                </form>
                            </td>
                            @can('categoryUpdate')
                                <td>
                                    <form action="{{ route('products.status', ['id' => $product['id']]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-{{ $product->status == 1 ? 'success' : 'danger' }}">
                                            {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                            @endcan

                            <td>
                                <a href="{{ route('products.detail', ['id' => $product['id']]) }}"
                                    class="btn btn-outline-info me-2"><i class="fa-solid fa-eye"></i></a>
                                @can('categoryUpdate')
                                    <a href="{{ route('products.edit', ['id' => $product['id']]) }}"
                                        class="btn btn-outline-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                @endcan
                                <form action="{{ route('products.delete', ['id' => $product['id']]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @can('categoryDelete')
                                        <button type="submit" class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
