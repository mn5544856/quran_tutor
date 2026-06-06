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
                'description' => 'This comprehensive bootcamp covers everything you need to become a professional web developer. Starting from basic HTML to advanced React and Node.js, you will build real-world projects that will impress employers. The course includes 50+ hours of video content, 20+ projects, and lifetime access to all future updates.',
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
                'requirements' => 'No prior programming experience required. A computer with internet connection and a code editor (VS Code recommended).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Data Science & Machine Learning Masterclass',
                'slug' => 'quran-learning-machine-learning-masterclass',
                'short_description' => 'Master data science, machine learning, and AI with Python. Learn Pandas, NumPy, Scikit-learn, and TensorFlow.',
                'description' => 'This comprehensive data science course will transform you into a data science professional. You will learn Python programming, data analysis, visualization, machine learning algorithms, and deep learning. By the end of this course, you will be able to build predictive models and extract insights from complex datasets.',
                'duration' => '45 hours',
                'price' => 5999.00,
                'image_url' => '/images/courses/quran-learning.jpg',
                'category_id' => $dataScienceId,
                'is_featured' => true,
                'what_you_learn' => json_encode([
                    'Master Python programming for data science',
                    'Work with Pandas and NumPy for data manipulation',
                    'Create stunning data visualizations with Matplotlib and Seaborn',
                    'Implement machine learning algorithms (Regression, Classification, Clustering)',
                    'Build deep learning models with TensorFlow and Keras',
                    'Handle real-world data science projects'
                ]),
                'requirements' => 'Basic mathematics knowledge. No programming experience required, but helpful.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Digital Marketing Mastery: SEO, Social Media & More',
                'slug' => 'digital-marketing-mastery-seo-social-media',
                'short_description' => 'Learn SEO, social media marketing, Google Ads, email marketing, and content strategy to grow your business.',
                'description' => 'Digital marketing is essential for any business today. This course covers everything from SEO fundamentals to advanced social media advertising. You will learn how to drive traffic, generate leads, and convert customers using proven digital marketing strategies.',
                'duration' => '30 hours',
                'price' => 3999.00,
                'image_url' => '/images/courses/quran-learning.jpg',
                'category_id' => $marketingId,
                'is_featured' => false,
                'what_you_learn' => json_encode([
                    'Master SEO techniques to rank on Google first page',
                    'Create winning social media marketing campaigns',
                    'Setup and optimize Google Ads for maximum ROI',
                    'Build email marketing funnels that convert',
                    'Develop content strategy that drives engagement',
                    'Analyze marketing metrics and make data-driven decisions'
                ]),
                'requirements' => 'Basic computer knowledge. No prior marketing experience needed.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}