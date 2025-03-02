@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="margin-left: 20%">
        <div class="card">
            <div class="card-header">
                Update Role
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('roles.index') }}" class="btn btn-outline-danger" style="margin-right: 10px">Back</a>
                <button class="btn btn-outline-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
@endsection
