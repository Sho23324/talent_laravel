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
                        <th class="bg-primary text-white">STATUS</th>
                        <th class="bg-primary text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td><img src="{{ asset('productImage/' . $product['image']) }}" alt="image" width="60px">
                            </td>
                            @if ($product['status'] == true)
                                <td class="text-success fw-bold">Available</td>
                            @endif
                            @if ($product['status'] == false)
                                <td class="text-danger fw-bold">Unavailable</td>
                            @endif
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
