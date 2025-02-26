@extends('category.home')

@section('content')
<div class="container mt-3">
    <h1>Category List</h1>
    <a href="{{route('category.create')}}" class="btn btn-outline-primary mt-4 mb-4 fw-bold">
        <i class="fa-solid fa-square-plus"></i> Create Category
    </a>
    <table class="table border text-center table-striped">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>IMAGE</th>
            <th>ACTION</th>
        </tr>
        @foreach($categories as $data)
        <tr>
            <td>{{$data['id']}}</td>
            <td>{{$data['name']}}</td>
            <td><img src="{{asset('categoryImage/'.$data['image'])}}" alt="{{$data['image']}}" width="50px"></td>
            <td>
                <a href="{{route('category.show', ['id'=>$data['id']])}}" class="btn btn-outline-primary" type="submit">View</a>
                <a href="{{route('category.edit',['id'=>$data['id']] )}}" class="btn btn-outline-warning" type="submit">Edit</a>
                <form class="d-inline" action="{{route('category.delete', ['id'=>$data['id']])}}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
