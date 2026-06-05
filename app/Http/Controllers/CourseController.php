<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CourseController extends Controller
{
    /**
     * Display all courses with filtering and sorting
     */
   public function index(Request $request)
{
    // Handle AJAX redirect for browser refresh
    if ($request->has('ajax') && !$request->ajax()) {
        $queryParams = $request->except('ajax');
        return redirect()->route('courses.index', $queryParams);
    }
    
    // Get sort parameter using reusable function
    $sort = $this->getValidSort($request->input('sort'));
    
    // Get current page for pagination
    $page = $request->input('page', 1);
    
    // Main courses query
    $query = $this->getBaseCourseQuery();
    
    // Apply category filter
    $query = $this->applyCategoryFilter($query, $request);
    
    // Apply sorting
    $query = $this->applySorting($query, $sort);
    
    // Get categories for sidebar/filter
    $categories = $this->getAllCategories();
    
    // Check if AJAX request
    if ($request->ajax() || $request->has('ajax')) {
        // Get paginated courses with proper page
        $courses = $this->getPaginatedCourses($query, 12, $page);
        
        return response()->json([
            'html' => view('courses.partials.course_grid', compact('courses'))->render(),
            'total' => $courses->total(),
            'current_page' => $courses->currentPage(),
            'last_page' => $courses->lastPage(),
            'per_page' => $courses->perPage(),
            'next_page_url' => $courses->nextPageUrl(),
            'prev_page_url' => $courses->previousPageUrl(),
        ]);
    }
    
    // Regular request - first page only
    $courses = $this->getPaginatedCourses($query, 12, 1);
    $featuredCourses = $this->getFeaturedCourses();
    
    // Get popular categories for hero section buttons
    $popularCategories = CourseCategory::where('is_active', true)
        ->withCount('courses')
        ->having('courses_count', '>', 0)
        ->orderBy('courses_count', 'desc')
        ->limit(6)
        ->get();
    
    return view('courses.index', compact(
        'courses', 
        'featuredCourses', 
        'categories',
        'popularCategories'
    ));
}
    /**
     * Display single course page
     */
    public function show(string $slug)
    {
        $course = $this->getCourseBySlug($slug);
        $relatedCourses = $this->getRelatedCourses($course);
        
        return view('courses.show', compact('course', 'relatedCourses'));
    }
    
    
    private function getAllCategories()
    {
        return CourseCategory::all();
    }

    /**
     * Get base course query with common select fields
     */
    private function getBaseCourseQuery()
    {
        return Course::with('category')
            ->select('id', 'title', 'slug', 'image_url', 'is_featured', 'category_id', 'created_at', 'short_description', 'duration');
    }

    /**
     * Get paginated courses
     */
    private function getPaginatedCourses(Builder $query, $perPage = 12)
    {
        return $query->paginate($perPage);
    }

    /**
     * Get course by slug with category
     */
    private function getCourseBySlug($slug)
    {
        return Course::with('category')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * Get category by slug
     */
    private function getCategoryBySlug($slug)
    {
        return CourseCategory::where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * Get courses by category ID
     */
    private function getCoursesByCategory($categoryId)
    {
        return $this->getBaseCourseQuery()
            ->where('category_id', $categoryId);
    }

    /**
     * Get featured courses
     */
    private function getFeaturedCourses($limit = 3)
    {
        return Course::featured()
            ->with('category')
            ->latest('created_at')
            ->limit($limit)
            ->get(['id', 'title', 'slug', 'image_url', 'category_id', 'short_description', 'duration']);
    }

    /**
     * Get related courses based on category
     */
    private function getRelatedCourses(Course $course, $limit = 2)
    {
        return Course::query()
            ->select('id', 'title', 'slug', 'image_url')
            ->where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * Get valid sort parameter (allowed values only)
     */
    private function getValidSort($sort, $default = 'latest')
    {
        $allowedSorts = ['oldest', 'latest', 'newest'];
        
        if (in_array($sort, $allowedSorts)) {
            return $sort;
        }
        
        return $default;
    }

    /**
     * Apply sorting to query
     */
    private function applySorting(Builder $query, $sort)
    {
        switch ($sort) {
            case 'oldest':
                return $query->orderBy('created_at', 'asc');
            case 'latest':
            case 'newest':
                return $query->orderBy('created_at', 'desc');
            default:
                return $query->latest('created_at');
        }
    }

    /**
     * Apply category filter to query
     */
    private function applyCategoryFilter(Builder $query, Request $request)
    {
        if ($request->filled('category') && $request->category !== 'all') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        return $query;
    }

}