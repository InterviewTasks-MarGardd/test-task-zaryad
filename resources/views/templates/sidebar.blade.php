<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    <div class="sidebar-box">
        <div class="bio text-center">
            <img src="{{ asset('images/person_1.jpg') }}" alt="Image Placeholder" class="img-fluid">
            <div class="bio-body">
                <h2>Meagan Smith</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                <p><a href="#" class="btn btn-primary btn-sm">Read my bio</a></p>
                <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="sidebar-box">
        <h3 class="heading">Popular Posts</h3>
        <div class="post-entry-sidebar">
            <ul>
                @foreach($popularPosts as $post)
                    <li>
                        <a href="{{ route('posts.show', [$post->category->slug, $post->slug]) }}">
                            @if($post->hasMedia('images'))
                                <img src="{{ $post->getFirstMediaUrl('images') }}" alt="{{ $post->title }}" class="mr-4">
                            @endif
                            <div class="text">
                                <h4>{{ Str::limit($post->title, 50) }}</h4>
                                <div class="post-meta">
                                    <span class="mr-2">{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <ul class="categories">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('posts.category', $category->slug) }}">
                        {{ $category->name }} <span>({{ $category->posts_count }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
