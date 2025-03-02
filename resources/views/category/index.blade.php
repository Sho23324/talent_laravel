@extends('layouts.master')

@section('content')
    <div class="container mt-3" style="margin-left:20%">
        <h1>Category List</h1>
        @can('categoryCreate')
            <a href="{{ route('category.create') }}" class="btn btn-outline-primary mt-4 mb-4 fw-bold">
                <i class="fa-solid fa-square-plus"></i> Create Category
            </a>
        @endcan
        <table class="table border table-striped">
            <tr>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">NAME</th>
                <th class="bg-primary text-white">IMAGE</th>
                <th class="bg-primary text-white">ACTION</th>
            </tr>
            @foreach ($categories as $data)
                <tr>
                    <td>{{ $data['id'] }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td><img src="{{ asset('categoryImage/' . $data['image']) }}" alt="{{ $data['image'] }}" width="50px">
                    </td>
                    <td>
                        <a href="{{ route('category.show', ['id' => $data['id']]) }}" class="btn btn-outline-primary"
                            type="submit">View</a>
                        @can('categoryUpdate')
                            <a href="{{ route('category.edit', ['id' => $data['id']]) }}" class="btn btn-outline-warning"
                                type="submit">Edit</a>
                        @endcan
                        @can('categoryDelete')
                            <form class="d-inline" action="{{ route('category.delete', ['id' => $data['id']]) }}"
                                method="POST">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
