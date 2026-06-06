<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('post_categories')->insert([
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Latest technology news and trends',
                'image' => '/images/categories/tech.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'description' => 'Educational tips and learning resources',
                'image' => '/images/categories/education.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Business strategies and entrepreneurship',
                'image' => '/images/categories/business.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'description' => 'Digital marketing tips and strategies',
                'image' => '/images/categories/marketing.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Web development tutorials and guides',
                'image' => '/images/categories/web-dev.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}