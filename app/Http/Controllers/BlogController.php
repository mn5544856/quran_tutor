<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class BlogController extends Controller
{
    protected CommonMarkConverter $converter;

    public function __construct(CommonMarkConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Blog listing page
     */
    public function index()
    {
        $posts = Post::published()
            ->latest('published_at')
            ->paginate(10);

        return view('blog.index', compact('posts'));
    }

    /**
     * Single blog post page
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Latest posts (exclude current)
        $latestPosts = Post::published()
            ->whereKeyNot($post->id)
            ->latest('published_at')
            ->limit(5)
            ->get();

        // Markdown → HTML
        $post->content_html = $this->converter
            ->convert($post->content)
            ->getContent();

        return view('blog.show', compact('post', 'latestPosts'));
    }

    /**
     * Search blog posts
     */
    public function search(Request $request)
    {
        $search = trim($request->get('search'));
        if (!$search) {
            return redirect()->route('blog.index');
        }

        $posts = Post::published()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%")
                      ->orWhere('excerpt', 'like', "%{$search}%");
            })
            ->latest('published_at')
            ->paginate(10);

        return view('blog.index', compact('posts', 'search'));
    }
}