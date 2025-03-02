@extends('layouts.master');

@section('content')
    <div class="container" style="margin-left:20%">
        <h1>Permission Lists</h1>
        @can('roleCreate')
            <a href="{{ route('permissions.create') }}" class="btn btn-outline-primary mt-4 mb-4 fw-bold">
                <i class="fa-solid fa-square-plus"></i> Create Permission
            </a>
        @endcan
        <div class="">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">ID</th>
                        <th class="bg-primary text-white">NAME</th>
                        <th class="bg-primary text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission['id'] }}</td>
                            <td>{{ $permission['name'] }}</td>
                            <td>
                                <a href="{{ route('permissions.show', $permission->id) }}"
                                    class="btn btn-outline-info me-2"><i class="fa-solid fa-eye"></i></a>
                                @can('permissionUpdate')
                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                        class="btn btn-outline-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                @endcan
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    @can('permissionDelete')
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
