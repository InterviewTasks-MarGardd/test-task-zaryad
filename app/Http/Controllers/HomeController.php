<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Service\PostService;

class HomeController extends Controller
{
    public function __construct(private readonly PostService $postService)
    {
    }

    public function index()
    {
        return view(
            'index',
            $this->postService->getPaginateAllPosts()
        );
    }
}
