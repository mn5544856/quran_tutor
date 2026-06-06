<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('course_categories')->insert([
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Learn frontend and backend web development technologies',
                'image' => '/images/categories/web-dev.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Science',
                'slug' => 'quran-learning',
                'description' => 'Master data analysis, machine learning, and AI',
                'image' => '/images/categories/quran-learning.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'Learn SEO, social media, and online marketing strategies',
                'image' => '/images/categories/marketing.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'description' => 'Build iOS and Android mobile applications',
                'image' => '/images/categories/mobile-dev.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing',
                'description' => 'Learn AWS, Azure, and Google Cloud platforms',
                'image' => '/images/categories/cloud.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}