<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;

class HomeController extends Controller
{
    public function index()
    {
        // Get popular/featured courses from database (limit to 3)
        $popularCourses = Course::with('category')
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get([
                'id', 
                'title', 
                'slug', 
                'short_description', 
                'description',
                'image_url', 
                'duration',
                'price',
                'is_featured'
            ]);
        
        // If no featured courses found, get latest 3 active courses
        if ($popularCourses->isEmpty()) {
            $popularCourses = Course::with('category')
                ->latest()
                ->limit(3)
                ->get([
                    'id', 
                    'title', 
                    'slug', 
                    'short_description', 
                    'description',
                    'image_url', 
                    'duration',
                    'price'
                ]);
        }
        
        // Get total active courses count
        $totalCourses = Course::count();
        
        // Optional: Get categories for any additional features
        $categories = CourseCategory::withCount('courses')
            ->having('courses_count', '>', 0)
            ->limit(5)
            ->get();
        
        // Pass data to view
        return view('home', compact('popularCourses', 'totalCourses', 'categories'));
    }
}