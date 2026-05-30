<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::insert([

            [
                'title' => 'Quran Reading Basics',
                'slug' => 'quran-reading-course/',
                'short_description' => 'Learn Arabic alphabet and basic Quran reading.',
                'description' => 'Learn Quran from scratch with proper Arabic pronunciation and basics of reading.',
                'level' => 'beginner',
                'duration' => '8 Weeks',
                'price' => null,
                'image_url' => 'https://images.pexels.com/photos/8489082/pexels-photo-8489082.jpeg',
                'category' => 'quran-basics',
                'is_featured' => true,
                'what_you_learn' => json_encode([
                    'Arabic alphabet recognition',
                    'Basic Quran reading',
                    'Pronunciation rules'
                ]),
                'requirements' => 'No prior knowledge required',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Tajweed & Recitation',
                'slug' => 'tajweed-recitation',
                'short_description' => 'Master Tajweed rules for perfect Quran recitation.',
                'description' => 'Improve your Quran recitation with advanced Tajweed rules.',
                'level' => 'intermediate',
                'duration' => '12 Weeks',
                'price' => null,
                'image_url' => 'https://images.pexels.com/photos/4331977/pexels-photo-4331977.jpeg',
                'category' => 'tajweed',
                'is_featured' => true,
                'what_you_learn' => json_encode([
                    'Tajweed rules',
                    'Proper pronunciation',
                    'Fluent recitation'
                ]),
                'requirements' => 'Basic Quran reading knowledge required',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Quran Memorization (Hifz)',
                'slug' => 'quran-memorization-hifz',
                'short_description' => 'Complete Hifz program with experienced teachers.',
                'description' => 'Become Hafiz with structured memorization plan.',
                'level' => 'advanced',
                'duration' => '2 Years',
                'price' => null,
                'image_url' => 'https://images.pexels.com/photos/14743719/pexels-photo-14743719.jpeg',
                'category' => 'hifz',
                'is_featured' => true,
                'what_you_learn' => json_encode([
                    'Full Quran memorization',
                    'Revision techniques',
                    'Retention methods'
                ]),
                'requirements' => 'Strong reading ability required',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Noorani Qaida',
                'slug' => 'noorani-qaida-course-basic',
                'short_description' => 'Learn basic Arabic alphabet and Quran reading foundation.',
                'description' => 'Start your Quran learning journey with Noorani Qaida step by step.',
                'level' => 'beginner',
                'duration' => '6 Weeks',
                'price' => null,
                'image_url' => 'https://images.pexels.com/photos/33761914/pexels-photo-33761914.jpeg',
                'category' => 'quran-basics',
                'is_featured' => true,
                'what_you_learn' => json_encode([
                    'Arabic alphabet recognition',
                    'Basic pronunciation',
                    'Joining letters',
                    'Foundation for Quran reading'
                ]),
                'requirements' => 'No prior knowledge required',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}