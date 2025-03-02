@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                User Details
            </div>
            <div class="card-body">
                <label for="name" class="fw-bold form-label">Name</label>
                <input type="text" class="form-control" value="{{ $user['name'] }}" readonly />
            </div>
            <div class="card-body">
                <label for="mail" class="fw-bold mt-4 form-label">Email</label>
                <input type="email" class="form-control" value="{{ $user['email'] }}" readonly />
            </div>

            <div class="card-body">
                <label for="address" class="fw-bold mt-4 form-label">Address</label>
                <input type="text" class="form-control" value="{{ $user['address'] }}" readonly />
            </div>
            <div class="card-body">
                <label for="phone" class="fw-bold mt-4 form-label">Phonenumber</label>
                <input type="text" class="form-control" value="{{ $user['phone'] }}" readonly />
            </div>
            <div class="card-body">
                <label for="gender" class="fw-bold mt-4 form-label">Gender</label>
                <input type="text" class="form-control" value="{{ $user['gender'] }}" readonly />
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('users.index') }}" type="submit" class="btn btn-outline-danger fw-bold me-2">Back</a>
            </div>
        </div>
    </div>
@endsection
