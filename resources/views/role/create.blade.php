@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="margin-left:20%">
        <div class="card">
            <div class="card-header">
                Create New Role
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" class="form-control" name="name" @error('name')

                    @enderror>
                    @error('name')
                        <div class="text-danger">
                            *{{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="card-footer">
                <a href="{{ route('roles.index') }}" type="submit" class="btn btn-outline-danger fw-bold me-2"
                    style="margin-right: 10px">Back</a>
                <button class="btn btn-outline-primary">Create</button>

            </div>
            </form>
        </div>
    </div>
@endsection
