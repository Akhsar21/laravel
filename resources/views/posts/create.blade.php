@extends('layouts.app')

@section('title','Create New Post')
@section('body','c-app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h4>@yield('title')</h4>
                </div>
                @include('posts.form')
                <div class="card-footer ml-3">
                    <button type="submit" class="btn btn-primary">Publish Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/jquery.tinymce.min.js') }}"></script> --}}
<script>
tinymce.init({
    selector: 'textarea#textarea',
    plugins: 'link code',
    menubar: false,
    // toolbar: 'code'
})
</script>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>

<script type="text/javascript">
    $('.select2-multi').select2();
</script>
@endsection