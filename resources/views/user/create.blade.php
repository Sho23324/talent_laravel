@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                Create New User
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <label for="name" class="fw-bold">User Name</label>
                    <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror
                        placeholder="Enter user Name" value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="email" class="fw-bold mt-4">Email</label>
                    <input type="email" name="email" class="form-control" @error('email') is-invalid @enderror
                        placeholder="Enter your email" value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror
                    <label for="password" class="fw-bold mt-4">Password</label>
                    <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror
                        placeholder="Enter your password" />
                    @error('password')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror
                    <label for="password" class="fw-bold mt-4">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        @error('password') is-invalid @enderror placeholder="Enter your password" />
                    @error('password')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="address" class="fw-bold mt-4">Address</label>
                    <textarea name="address" rows="3" placeholder="Enter Your Address" class="form-control"
                        @error('address') is-invalid @enderror>{{ old('address') }}</textarea>
                    @error('address')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="phone" class="fw-bold mt-4">Phonenumber</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Your Phonenumber"
                        @error('phone') is-invalid @enderror value="{{ old('phone') }}" />
                    @error('phone')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror
                    <div class="">
                        <label for="gender" class="fw-bold mt-4">Gender</label><br>
                        <input type="radio" name="gender" class="" @error('gender') is-invalid @enderror
                            value="Male" />
                        <label for="gender" class="form-check-label" style="margin-right: 40px">Male</label>
                        <input type="radio" name="gender" class="" @error('gender') is-invalid @enderror
                            value="Female" />
                        <label for="gender" class="form-check-label" style="margin-right: 40px">Female</label>
                        @error('gender')
                            <div class="text-danger" style="font-size: 12px">
                                *{{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- <div class="form-check form-switch mt-4"> --}}
                    <label for="role" class="mt-4">Role</label><br>
                    <input type="radio" class="" name="role" value="admin"
                        @error('role')

                        @enderror>
                    <label for="role" class="form-check-label" style="margin-right: 40px">Admin</label>

                    <input type="radio" class="" name="role" value="guest">
                    <label for="role" class="form-check-label">Guest</label>
                    @error('role')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror
                    {{-- </div> --}}
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('products.index') }}" type="submit" class="btn btn-outline-danger fw-bold me-2"
                    style="margin-right: 10px">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Create</button>
            </div>
            </form>
        </div>
    </div>
@endsection
