<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Str;

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
    public function index(Request $request)
    {
        $query = Post::published()->with('category', 'author');
        
        // Filter by category if provided
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        $posts = $query->latest('published_at')->paginate(10);
        
        // Get sidebar data
        $sidebarData = $this->getSidebarData();
        
        return view('blog.index', array_merge(
            compact('posts'),
            $sidebarData
        ));
    }

    /**
     * Single blog post page
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->published()
            ->with(['category', 'tags'])
            ->firstOrFail();

        // Increment view count
        $post->increment('views');

        // Get sidebar data
        $sidebarData = $this->getSidebarData($post->id);
        
        // Get related posts
        $relatedPosts = $this->getRelatedPosts($post);
        
        // Get popular posts
        $popularPosts = $this->getPopularPosts($post->id);
        
        // Get previous/next posts
        $previousPost = $this->getPreviousPost($post);
        $nextPost = $this->getNextPost($post);

        // Markdown → HTML
        $post->content_html = $this->convertMarkdownToHtml($post->content);
        $categories = $this->getAllCategories();
        // SEO Data
        $seo = $this->getSeoData($post);

        return view('blog.show', array_merge(
            compact('post', 'relatedPosts', 'categories', 'previousPost', 'nextPost', 'seo'),
            $sidebarData
        ));
    }

    /**
     * Search blog posts
     */
    public function search(Request $request)
    {
        $search = trim($request->input('search'));
        
        if (!$search) {
            return redirect()->route('blog.index');
        }

        $posts = $this->searchPosts($search);
        
        // Get sidebar data
        $sidebarData = $this->getSidebarData();
        
        return view('blog.index', array_merge(
            compact('posts', 'search'),
            $sidebarData
        ));
    }

    /**
     * Display posts by category
     */
    public function category($slug)
    {
        $category = PostCategory::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
        
        $posts = $this->getPostsByCategory($category->id);
        
        // Get sidebar data
        $sidebarData = $this->getSidebarData();
        
        return view('blog.category', array_merge(
            compact('category', 'posts'),
            $sidebarData
        ));
    }

    // ==================== REUSABLE PRIVATE METHODS ====================

    /**
     * Get sidebar data (categories, latest posts, popular posts)
     */
    private function getSidebarData($excludePostId = null)
    {
        return [
            'categories' => $this->getAllCategories(),
            'latestPosts' => $this->getLatestPosts(5, $excludePostId),
            'popularPosts' => $this->getPopularPosts($excludePostId, 5),
        ];
    }

    /**
     * Get all active categories with post counts
     */
    private function getAllCategories()
    {
        return PostCategory::where('is_active', true)
            ->withCount(['posts' => function($query) {
                $query->published();
            }])
            ->having('posts_count', '>', 0)
            ->orderBy('posts_count', 'desc')
            ->get();
    }

    /**
     * Get latest posts
     */
    private function getLatestPosts($limit = 5, $excludePostId = null)
    {
        $query = Post::published()
            ->with('category')
            ->latest('published_at')
            ->limit($limit);
        
        if ($excludePostId) {
            $query->whereKeyNot($excludePostId);
        }
        
        return $query->get();
    }

    /**
     * Get popular posts (most viewed)
     */
    private function getPopularPosts($excludePostId = null, $limit = 5)
    {
        $query = Post::published()
            ->with('category')
            ->orderBy('views', 'desc')
            ->limit($limit);
        
        if ($excludePostId) {
            $query->whereKeyNot($excludePostId);
        }
        
        return $query->get();
    }

    /**
     * Get related posts based on category
     */
    private function getRelatedPosts(Post $post, $limit = 3)
    {
        if (!$post->category_id) {
            return collect();
        }
        
        return Post::published()
            ->with('category')
            ->where('category_id', $post->category_id)
            ->whereKeyNot($post->id)
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    /**
     * Get previous post (older)
     */
    private function getPreviousPost(Post $post)
    {
        return Post::published()
            ->where('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->first();
    }

    /**
     * Get next post (newer)
     */
    private function getNextPost(Post $post)
    {
        return Post::published()
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->first();
    }

    /**
     * Search posts by title, content, or excerpt
     */
    private function searchPosts($searchTerm, $perPage = 10)
    {
        return Post::published()
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', "%{$searchTerm}%")
                      ->orWhere('content', 'like', "%{$searchTerm}%")
                      ->orWhere('excerpt', 'like', "%{$searchTerm}%");
            })
            ->latest('published_at')
            ->paginate($perPage);
    }

    /**
     * Get posts by category ID
     */
    private function getPostsByCategory($categoryId, $perPage = 10)
    {
        return Post::published()
            ->with('category')
            ->where('category_id', $categoryId)
            ->latest('published_at')
            ->paginate($perPage);
    }

    /**
     * Convert markdown to HTML
     */
    private function convertMarkdownToHtml($content)
    {
        return $this->converter
            ->convert($content)
            ->getContent();
    }

    /**
     * Get SEO data for post
     */
    private function getSeoData(Post $post)
    {
        return [
            'title' => $post->seo_title ?? $post->title,
            'description' => $post->seo_description ?? $post->excerpt ?? Str::limit(strip_tags($post->content), 160),
            'image' => $post->featured_image,
        ];
    }

    /**
     * Get reading time for post
     */
    private function getReadingTime(Post $post)
    {
        if ($post->reading_time) {
            return $post->reading_time;
        }
        
        $wordCount = str_word_count(strip_tags($post->content));
        return ceil($wordCount / 200); // 200 words per minute
    }

    /**
     * Get post meta info (views, reading time, date)
     */
    private function getPostMeta(Post $post)
    {
        return [
            'views' => number_format($post->views ?? 0),
            'reading_time' => $this->getReadingTime($post),
            'published_date' => optional($post->published_at)->format('F d, Y'),
            'formatted_date' => optional($post->published_at)->format('M d, Y'),
            'human_readable_date' => optional($post->published_at)->diffForHumans(),
        ];
    }
}