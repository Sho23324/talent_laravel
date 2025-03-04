@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <div class="card">
            <div class="card-header fw-bold bg-primary text-white">
                Edit Product
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <label for="name" class="fw-bold">User Name</label>
                    <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror
                        placeholder="Enter user Name" value="{{ $user['name'] }}">
                    @error('name')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="address" class="fw-bold mt-4">Address</label>
                    <textarea name="address" rows="3" placeholder="Enter Your Address" class="form-control"
                        @error('address') is-invalid @enderror>{{ $user['address'] }}</textarea>
                    @error('address')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror

                    <label for="phone" class="fw-bold mt-4">Phonenumber</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user['phone'] }}"
                        placeholder="Enter Your Phonenumber" @error('phone') is-invalid @enderror>
                    @error('phone')
                        <div class="text-danger" style="font-size: 12px">
                            *{{ $message }}
                        </div>
                    @enderror
                    <div class="">
                        <label for="gender" class="fw-bold mt-4">Gender</label><br>
                        <input type="radio" name="gender" class="" @error('gender') is-invalid @enderror
                            value="Male" {{ $user->gender == 'Male' ? 'checked' : '' }} />

                        <label for="gender" class="form-check-label" style="margin-right: 40px">Male</label>
                        <input type="radio" name="gender" class="" @error('gender') is-invalid @enderror
                            value="Female" {{ $user->gender == 'Female' ? 'checked' : '' }} />
                        <label for="gender" class="form-check-label" style="margin-right: 40px">Female</label>
                        @error('gender')
                            <div class="text-danger" style="font-size: 12px">
                                *{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="gender" class="fw-bold mt-4">Status</label><br>
                        <input type="checkbox" name="status" class="" value="active"
                            {{ $user->status == true ? 'checked' : '' }} />

                        <label for="gender" class="form-check-label" style="margin-right: 40px">Active</label>
                    </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('users.index') }}" type="submit" class="btn btn-outline-danger fw-bold me-2"
                    style="margin-right: 10px">Back</a>
                <button type="submit" class="btn btn-outline-primary fw-bold">Update</button>
            </div>
            </form>
        </div>
    </div>
@endsection
