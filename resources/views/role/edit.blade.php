@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="margin-left: 20%">
        {{-- {{ dd($rolePermissions) }} --}}
        <div class="card">
            <div class="card-header">
                Update Role
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" class="form-control mb-3" name="name" value="{{ $role->name }}">

                    @foreach ($permissions as $permission)
                        <input type="checkbox" name="permissions[]" class="mb-3" value="{{ $permission['id'] }}"
                            @if (in_array($permission->id, $rolePermissions)) checked @endif>
                        <label for="">{{ $permission['name'] }}</label>
                        <br>
                    @endforeach
                    </tbody>
            </div>
            <div class="card-footer">
                <a href="{{ route('roles.index') }}" class="btn btn-outline-danger" style="margin-right: 10px">Back</a>
                <button class="btn btn-outline-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
@endsection
