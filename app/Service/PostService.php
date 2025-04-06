<?php

namespace App\Service;

use App\Models\Category;
use App\Models\Post;

class PostService
{
    public function getDefaultData(): array
    {
        $featuredPosts = Post::with(['category', 'media'])
            ->latest()
            ->take(3)
            ->get();

        $popularPosts = Post::with(['category', 'media'])
            ->take(3)
            ->get();

        $categories = Category::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->get();

        return compact('featuredPosts', 'popularPosts', 'categories');
    }

    public function getPaginateAllPosts(): array
    {
        $posts = Post::query()->with('media')
            ->paginate(8);

        return compact( 'posts');
    }

    public function getPaginatePostsByCategory(string $categorySlug): array
    {
        $category = Category::query()->where('slug', $categorySlug)
            ->firstOrFail();

        $posts = Post::query()->where('category_id', $category->id)
            ->with('media')
            ->paginate(8);

        return compact( 'posts');
    }

    public function getPost(string $categorySlug, string $postSlug): array
    {
        $post = Post::query()->whereHas('category', function($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        })
            ->where('slug', $postSlug)
            ->with(['category', 'media'])
            ->firstOrFail();

        return compact( 'post');
    }
}
