@extends('layouts.app')

@section('title','Users Management')
@section('body','c-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">@yield('title')</h4>
                {{-- <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">Add New
                    Tag</button> --}}
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th class="text-center">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td class="text-center">
                                @can('edit.users')
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-primary btn-sm"
                                    data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i
                                        class="cil-pencil"></i></a>
                                @endcan
                                @can('delete.users')
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                        data-placement="top" data-original-title="Delete"><i
                                            class="cil-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="mt-3 content-center">
                    {{ $tags->links()}}
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection