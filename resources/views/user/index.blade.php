@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <h1>User Lists</h1>
        @can('userCreate')
            <a href="{{ route('users.create') }}" class="btn btn-outline-primary mt-4 mb-4 fw-bold">
                <i class="fa-solid fa-square-plus"></i> Create User
            </a>
        @endcan
        <div class="">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">NAME</th>
                        <th class="bg-primary text-white">EMAIL</th>
                        <th class="bg-primary text-white">ADDRESS</th>
                        <th class="bg-primary text-white">PHONENUMBER</th>
                        <th class="bg-primary text-white">GENDER</th>
                        <th class="bg-primary text-white">ROLE</th>
                        <th class="bg-primary text-white">STATUS</th>
                        <th class="bg-primary text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td style="text-transform:capitalize">{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['address'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                            <td>{{ $user['gender'] }}</td>
                            <td style="text-transform: uppercase">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                            @if ($user['status'] == true)
                                <td class="text-success">Active</td>
                            @endif
                            @if ($user['status'] == false)
                                <td class="text-danger">Suspand</td>
                            @endif
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-info me-2"><i
                                        class="fa-solid fa-eye"></i></a>
                                @can('userUpdate')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning me-2"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                @endcan
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    @can('userDelete')
                                        <button type="submit" class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
