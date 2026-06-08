<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Get category IDs
        $webDevId = DB::table('course_categories')->where('slug', 'web-development')->value('id');
        $dataScienceId = DB::table('course_categories')->where('slug', 'quran-learning')->value('id');
        $marketingId = DB::table('course_categories')->where('slug', 'digital-marketing')->value('id');

        DB::table('courses')->insert([
            [
                'title' => 'Complete Web Development Bootcamp 2024',
                'slug' => 'complete-web-development-bootcamp-2024',
                'short_description' => 'Become a full-stack web developer from scratch. Learn HTML, CSS, JavaScript, React, Node.js, and MongoDB.',

                'description' => 'This comprehensive bootcamp covers everything you need to become a professional web developer.',

                'description_html' => '<p>This comprehensive bootcamp covers everything you need to become a professional web developer.</p>',

                'duration' => '50 hours',
                'price' => 4999.00,

                'image_url' => '/images/courses/quran-learning.jpg',

                'category_id' => $webDevId,
                'is_featured' => true,

                'what_you_learn' => json_encode([
                    'Build responsive websites using HTML5, CSS3, and JavaScript',
                    'Create dynamic web applications using React.js',
                    'Develop RESTful APIs using Node.js and Express',
                    'Work with MongoDB for database management',
                    'Deploy applications to production servers',
                    'Understand version control with Git and GitHub'
                ]),

                'requirements' => 'No prior programming experience required.',

                // SEO
                'meta_title' => 'Complete Web Development Bootcamp 2024',
                'meta_description' => 'Learn HTML, CSS, JavaScript, React, Node.js and MongoDB from scratch.',
                'meta_keywords' => 'web development, html, css, javascript, react, nodejs, mongodb',
                'focus_keyword' => 'web development bootcamp',
                // Open Graph
                'og_title' => 'Complete Web Development Bootcamp 2024',
                'og_description' => 'Become a professional full-stack web developer.',
                'og_image_url' => '/images/courses/web-development.jpg',
                'twitter_card' => 'summary_large_image',
                // SEO Advanced
                'cononical_url' => 'https://yourdomain.com/courses/complete-web-development-bootcamp-2024',

                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'Course',
                    'name' => 'Complete Web Development Bootcamp 2024',
                    'description' => 'Become a full-stack web developer from scratch.'
                ]),

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}