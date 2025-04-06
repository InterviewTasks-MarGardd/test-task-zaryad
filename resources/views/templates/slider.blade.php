<section class="site-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme home-slider">
                    @foreach($featuredPosts as $post)
                        <div>
                            <a href="{{ route('posts.show', [$post->category->slug, $post->slug]) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ $post->getFirstMediaUrl('images') }}');">
                                <div class="text half-to-full">
                                    <div class="post-meta">
                                        <span class="category">{{ $post->category->name }}</span>
                                        <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span>
                                    </div>
                                    <h3>{{ $post->title }}</h3>
                                    <p>{{ Str::limit($post->description, 100) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
