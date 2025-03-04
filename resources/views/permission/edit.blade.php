@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="margin-left:20%">
        <div class="card">
            <div class="card-header">
                Update Permission
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <label for="name" class="form-label" style="font-weight: bold">Permission Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}">

                    <label for="name" class="form-label mt-4" style="font-weight: bold">Roles</label><br>
                    @foreach ($roles as $role)
                        <input type="text" class="form-control mb-3" style="text-transform: uppercase;"
                            value="{{ $role }}">
                    @endforeach
            </div>
            <div class="card-footer">
                <a href="{{ route('permissions.index') }}" class="btn btn-outline-danger" style="margin-right:10px">Back</a>
                <button class="btn btn-outline-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
@endsection
