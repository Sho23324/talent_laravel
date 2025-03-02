@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                Role Details
            </div>
            <div class="card-body">
                <label for="name" class="fw-bold mb-2">Role Name</label>
                <input type="text" class="form-control" value="{{ $role['name'] }}" readonly>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('roles.index') }}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
            </div>
        </div>
    </div>
@endsection
