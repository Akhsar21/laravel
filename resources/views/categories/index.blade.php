@extends('layouts.app')

@section('title','All Categories')
@section('body','c-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">@yield('title')</h4>
                <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">Add New
                    Category</button>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th class="text-center">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Edit"><i
                                        class="cil-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Delete"><i
                                        class="cil-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3 content-center">
                    {{ $categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Enter Category Name">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection