@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @if(!isset($post))
        @include('templates.slider', ['featuredPosts' => $featuredPosts])
    @endif
    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                @if(!isset($post))
                    <div class="col-md-6">
                        <h2 class="mb-4">Latest Posts</h2>
                    </div>
                @endif
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    @if(isset($post))
                        @include('templates.post', ['post' => $post])
                    @else
                        @include('templates.posts', ['posts' => $posts])
                    @endif
                </div>

                @include('templates.sidebar', [
                    'popularPosts' => $popularPosts,
                    'categories' => $categories
                ])
            </div>
        </div>
    </section>
@endsection
