@extends('layouts.app')

@section('title','All Posts')
@section('body','c-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">@yield('title')</h4>
                <a href="{{ route('posts.create') }}" class="btn btn-info float-right">Add New Post</a>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <th class="text-center">{{ $post->id }}</th>
                            <td>
                                <div>{{ $post->title }}</div>
                                <div class="small text-muted"><span>Posted by</span> {{ $post->user->name }}</div>
                            </td>
                            <td>
                                <div class="tag">
                                    @foreach ($post->tags as $tag)
                                    <span class="badge badge-warning">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail"
                                    style="height: 40px;">
                            </td>
                            <td class="text-center">
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Edit"><i
                                            class="cil-pencil"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Delete"><i
                                            class="cil-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3 float-right">
                    {{ $posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection