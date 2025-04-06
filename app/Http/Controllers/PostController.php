<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Service\PostService;

class PostController extends Controller
{
    public function __construct(private readonly PostService $postService)
    {
    }

    public function index(string $categorySlug)
    {
        return view(
            'index',
            $this->postService->getPaginatePostsByCategory($categorySlug)
        );
    }

    public function show($categorySlug, $postSlug)
    {
        return view(
            'index',
            $this->postService->getPost($categorySlug, $postSlug)
        );
    }
}
