<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * All courses page with filtering and sorting
     */
    public function index(Request $request)
    {
        $query = Course::query()
            ->select('id', 'title', 'slug', 'image_url', 'is_featured', 'category', 'level', 'created_at');
        
        // ✅ Apply level filter from query parameter
        if ($request->has('level') && $request->level != 'all') {
            $query->where('level', $request->level);
        }
        
        // ✅ Apply sorting from query parameter
        switch ($request->get('sort', 'newest')) {
            case 'level_asc':
                $query->orderByRaw("FIELD(level, 'beginner', 'intermediate', 'advanced')");
                break;
            case 'level_desc':
                $query->orderByRaw("FIELD(level, 'advanced', 'intermediate', 'beginner')");
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->latest();
        }
        
        $courses = $query->paginate(12);
        
        // ✅ For AJAX request
        if ($request->ajax()) {
            return response()->json([
                'html' => view('courses.partials.course_grid', compact('courses'))->render(),
                'pagination' => (string) $courses->links(),
                'total' => $courses->total()
            ]);
        }
        
        $featuredCourses = Course::query()
            ->select('id', 'title', 'slug', 'image_url', 'category')
            ->where('is_featured', 1)
            ->latest()
            ->limit(3)
            ->get();

        return view('courses.index', compact('courses', 'featuredCourses'));
    }

    /**
     * Single course page
     */
    public function show(string $slug)
    {
        $course = Course::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedCourses = Course::query()
            ->select('id', 'title', 'slug', 'image_url', 'category')
            ->where('category', $course->category)
            ->where('id', '!=', $course->id)
            ->latest()
            ->limit(2)
            ->get();

        return view('courses.show', compact('course', 'relatedCourses'));
    }

    /**
     * Category filter page with level and sort
     */
    public function byCategory(Request $request, string $slug)
    {   
        $categoryMap = [
            'quran-basics' => 'Quran Reading Basics',
            'tajweed' => 'Tajweed & Recitation',
            'hifz' => 'Quran Memorization (Hifz)',
            'noorani-qaida' => 'Noorani Qaida',
        ];

        abort_if(!isset($categoryMap[$slug]), 404);

        $query = Course::query()
            ->select('id', 'title', 'slug', 'image_url', 'category', 'level', 'created_at')
            ->where('category', $categoryMap[$slug]);
        
        // ✅ Apply level filter
        if ($request->has('level') && $request->level != 'all') {
            $query->where('level', $request->level);
        }
        
        // ✅ Apply sorting
        switch ($request->get('sort', 'newest')) {
            case 'level_asc':
                $query->orderByRaw("FIELD(level, 'beginner', 'intermediate', 'advanced')");
                break;
            case 'level_desc':
                $query->orderByRaw("FIELD(level, 'advanced', 'intermediate', 'beginner')");
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->latest();
        }
        
        $courses = $query->paginate(12);
        
        // ✅ For AJAX request
        if ($request->ajax()) {
            return response()->json([
                'html' => view('courses.partials.course_grid', compact('courses'))->render(),
                'pagination' => (string) $courses->links()
            ]);
        }
        
        return view('courses.category', [
            'courses' => $courses,
            'categoryTitle' => $categoryMap[$slug],
            'slug' => $slug
        ]);
    }
}