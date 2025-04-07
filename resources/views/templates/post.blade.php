<h1 class="mb-4">{{ $post->title }}</h1>
<div class="post-meta">
    <span class="category">{{ $post->category->name }}</span>
    <span class="mr-2">{{ $post->created_at->format('F d, Y') }} </span> &bullet;
    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
</div>
<div class="post-content-body">
    <div class="row mb-5">
        @php $media = $post->getMedia('images') @endphp
        @if($media->isNotEmpty())
            <div class="col-md-12 mb-4 element-animate">
                <img src="{{ $media[0]->getUrl() }}" alt="{{ $post->title }}" class="img-fluid">
            </div>
            @if(isset($media[1]))
                <div class="col-md-6 mb-4 element-animate">
                    <img src="{{ $media[1]->getUrl() }}" alt="Image placeholder" class="img-fluid">
                </div>
            @endif
            @if(isset($media[2]))
                <div class="col-md-6 mb-4 element-animate">
                    <img src="{{ $media[2]->getUrl() }}" alt="Image placeholder" class="img-fluid">
                </div>
            @endif
        @else
            <div class="col-md-12 mb-4 element-animate">
                <img src="{{ asset('images/not_image.png') }}" alt="{{ $post->title }}" class="img-fluid">
            </div>
        @endif
    </div>
    <p>{!! nl2br(e($post->description)) !!}</p>
</div>

<div class="pt-5">
    <p>Categories:  <a href="/posts/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
</div>
