@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <h1>Role Lists</h1>
        @can('roleCreate')
            <a href="{{ route('roles.create') }}" class="btn btn-outline-primary mt-4 mb-4 fw-bold">
                <i class="fa-solid fa-square-plus"></i> Create Role
            </a>
        @endcan
        <div class="">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">NAME</th>
                        <th class="bg-primary text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td style="text-transform: capitalize">{{ $role['name'] }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-info me-2"><i
                                        class="fa-solid fa-eye"></i></a>
                                @can('roleUpdate')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-warning me-2"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                @endcan
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    @can('roleDelete')
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
