@extends('layouts.app')

@section('title','Edit role for ' . $user->name)
@section('body','c-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header">@yield('title')</h4>
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                            name="email" value="{{ $user->email }}" placeholder="Email Address" disabled>
                        @error('email')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="name"
                            name="name" value="{{ $user->name }}" placeholder="Enter your name">
                        @error('name')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>

                        @foreach ($roles as $role)
                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                            <label>{{ $role->name }}</label>
                        </div>
                        @endforeach
                    </div> 
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection