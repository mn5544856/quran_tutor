<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    /**
     * All courses page
     */
    public function index()
    {
        $courses = Course::query()
            ->select('id', 'title', 'slug', 'image_url', 'is_featured', 'category')
            ->latest()
            ->paginate(12);

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
     * Category filter page
     */
    public function byCategory(string $slug)
{   

    $categoryMap = [
        'quran-basics' => 'Quran Reading Basics',
        'tajweed' => 'Tajweed & Recitation',
        'hifz' => 'Quran Memorization (Hifz)',
        'noorani-qaida' => 'Noorani Qaida',

    ];

    abort_if(!isset($categoryMap[$slug]), 404);

    $courses = Course::query()
        ->select('id', 'title', 'slug', 'image_url', 'category')
        ->where('category', $categoryMap[$slug])
        ->latest()
        ->paginate(12); // 👈 pagination added
    return view('courses.category', [
        'courses' => $courses,
        'categoryTitle' => $categoryMap[$slug],
        'slug' => $slug
    ]);
}
}
