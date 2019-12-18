@extends('layouts.front')

@section('title', 'Home')

@section('banner')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-9 col-md-12">
                <h1 class="text-uppercase">
                    We Ensure better education
                    for a better world
                </h1>
                <p class="pt-10 pb-10">
                    In the history of modern astronomy, there is probably no one greater leap forward than the
                    building and launch of the space telescope known as the Hubble.
                </p>
                <a href="#" class="primary-btn text-uppercase">Get Started</a>
            </div>

        </div>
    </div>
</section>
@endsection

@section('content')
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Latest posts from our Blog</h1>
                    <p>In the history of modern astronomy there is.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
                <p class="meta">{{ $post->created_at->format("F m, Y") }} | By <a href="#">{{ $post->user->name }}</a></p>
                <a href="{{ route('get.blog', $post) }}">
                    <h5>{{ $post->title}}</h5>
                </a>
                {!! Str::limit($post->content, 100) !!}
                <a href="{{ route('get.blog', $post) }}" class="details-btn d-flex justify-content-center align-items-center">
                    <span class="details">Details</span>
                    <span class="lnr lnr-arrow-right"></span>
                </a>
            </div>                
            @endforeach
        </div>
        <div class="align-items-center mt-3">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection