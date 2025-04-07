<div class="row">
    @forelse($posts as $post)
        <div class="col-md-6">
            <a href="{{ route('posts.show', [$post->category->slug, $post->slug]) }}"
               class="blog-entry element-animate"
               data-animate-effect="fadeIn">
                <img src="{{ $post->getFirstImage() }}" alt="{{ $post->title }}" class="img-fluid" style="height: 233px">
                <div class="blog-content-body">
                    <div class="post-meta">
                        <span class="category">{{ $post->category->name }}</span>
                        <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span>3</span>
                    </div>
                    <h2>{{ $post->title }}</h2>
{{--                    <p>{{ Str::limit(strip_tags($post->description), 100) }}</p>--}}
                </div>
            </a>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">No posts found</div>
        </div>
    @endforelse
    <div class="col-md-12 text-center">
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination">
                @if ($posts->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Prev</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev">Prev</a></li>
                @endif
                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    @if ($page == $posts->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
                @if ($posts->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}" rel="next">Next</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
