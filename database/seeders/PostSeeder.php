<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Get category IDs
        $techId = DB::table('post_categories')->where('slug', 'technology')->value('id');
        $educationId = DB::table('post_categories')->where('slug', 'education')->value('id');
        $businessId = DB::table('post_categories')->where('slug', 'business')->value('id');
        $marketingId = DB::table('post_categories')->where('slug', 'marketing')->value('id');
        $webDevId = DB::table('post_categories')->where('slug', 'web-development')->value('id');
        
        DB::table('posts')->insert([
            [
                'title' => 'The Future of Artificial Intelligence in 2024',
                'slug' => 'future-of-artificial-intelligence-2024',
                'short_description' => 'Explore how AI is transforming industries and what to expect in the coming years.',
                'description' => 'Artificial Intelligence continues to revolutionize the way we work and live. From ChatGPT to autonomous vehicles, AI is becoming increasingly integrated into our daily lives. This comprehensive guide explores the latest AI trends, ethical considerations, and predictions for the future.',
                'description_html' => '<p>Artificial Intelligence continues to revolutionize the way we work and live. From ChatGPT to autonomous vehicles, AI is becoming increasingly integrated into our daily lives.</p><p>This comprehensive guide explores the latest AI trends, ethical considerations, and predictions for the future.</p>',
                'image_url' => '/images/posts/quran-learning.jpg',
                'image_alt' => 'Future of Artificial Intelligence',
                'seo_title' => 'Future of AI 2024: Trends and Predictions',
                'seo_description' => 'Discover how AI is transforming industries in 2024. Learn about latest trends, ethical considerations, and future predictions.',
                'seo_keywords' => 'AI, artificial intelligence, machine learning, future technology',
                'focus_keyword' => 'artificial intelligence future',
                'canonical_url' => null,
                'og_image' => '/images/posts/ai-future-og.jpg',
                'og_title' => 'The Future of Artificial Intelligence in 2024',
                'og_description' => 'Explore AI transformation across industries',
                'og_type' => 'article', // Added og_type
                'twitter_card' => 'summary_large_image',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'scheduled_for' => null,
                'is_featured' => true,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'Article',
                    'headline' => 'The Future of Artificial Intelligence in 2024'
                ]),
                'category_id' => $techId,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
                'deleted_at' => null,
            ],
            [
                'title' => '10 Tips for Learning Quran Online Effectively',
                'slug' => '10-tips-learning-quran-online-effectively',
                'short_description' => 'Discover proven strategies to maximize your Quran learning experience online.',
                'description' => 'Learning Quran online has become increasingly popular. This article shares 10 practical tips to help you make the most of your online Quran learning journey, from choosing the right tutor to maintaining consistency.',
                'description_html' => '<p>Learning Quran online has become increasingly popular. This article shares 10 practical tips to help you make the most of your online Quran learning journey.</p><p>From choosing the right tutor to maintaining consistency, these strategies will accelerate your progress.</p>',
                'image_url' => '/images/posts/quran-learning.jpg',
                'image_alt' => 'Learning Quran Online',
                'seo_title' => '10 Tips for Learning Quran Online | Effective Guide',
                'seo_description' => 'Master Quran learning online with these 10 proven tips. Improve your Tajweed, find the right tutor, and stay consistent.',
                'seo_keywords' => 'Quran learning, online Quran, Tajweed, Islamic education',
                'focus_keyword' => 'learning Quran online',
                'canonical_url' => null,
                'og_image' => '/images/posts/quran-learning-og.jpg',
                'og_title' => '10 Tips for Learning Quran Online Effectively',
                'og_description' => 'Proven strategies for online Quran learning',
                'og_type' => 'article', // Added og_type
                'twitter_card' => 'summary_large_image',
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'scheduled_for' => null,
                'is_featured' => true,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'BlogPosting',
                    'headline' => '10 Tips for Learning Quran Online Effectively'
                ]),
                'category_id' => $educationId,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
                'deleted_at' => null,
            ],
            [
                'title' => 'Digital Marketing Strategies That Work in 2024',
                'slug' => 'digital-marketing-strategies-2024',
                'short_description' => 'Learn the most effective digital marketing strategies to grow your business this year.',
                'description' => 'Digital marketing landscape is constantly evolving. Stay ahead with these proven strategies including SEO, content marketing, social media advertising, and email campaigns that deliver real results.',
                'description_html' => '<p>Digital marketing landscape is constantly evolving. Stay ahead with these proven strategies including SEO, content marketing, social media advertising, and email campaigns that deliver real results.</p>',
                'image_url' => '/images/posts/quran-learning.jpg',
                'image_alt' => 'Digital Marketing Strategies',
                'seo_title' => 'Digital Marketing Strategies 2024 | Growth Guide',
                'seo_description' => 'Discover effective digital marketing strategies for 2024. Learn SEO, content marketing, social media, and email marketing tips.',
                'seo_keywords' => 'digital marketing, SEO, social media marketing, content marketing',
                'focus_keyword' => 'digital marketing strategies',
                'canonical_url' => null,
                'og_image' => '/images/posts/reading-holyquran.jpg',
                'og_title' => 'Digital Marketing Strategies That Work in 2024',
                'og_description' => 'Proven marketing strategies for business growth',
                'og_type' => 'article', // Added og_type
                'twitter_card' => 'summary_large_image',
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'scheduled_for' => null,
                'is_featured' => false,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'Article',
                    'headline' => 'Digital Marketing Strategies That Work in 2024'
                ]),
                'category_id' => $marketingId,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
                'deleted_at' => null,
            ],
            [
                'title' => 'How to Start a Successful Online Business',
                'slug' => 'how-to-start-successful-quran-learning',
                'short_description' => 'Step-by-step guide to launching and growing your online business from scratch.',
                'description' => 'Starting an online business has never been easier. This comprehensive guide covers everything from ideation and validation to launching and scaling your online venture successfully.',
                'description_html' => '<p>Starting an online business has never been easier. This comprehensive guide covers everything from ideation and validation to launching and scaling your online venture successfully.</p>',
                'image_url' => '/images/posts/quran-learning.jpg',
                'image_alt' => 'Starting Online Business',
                'seo_title' => 'How to Start Online Business | Complete Guide 2024',
                'seo_description' => 'Learn how to start and grow a successful online business. Step-by-step guide covering ideation, validation, launch, and scaling.',
                'seo_keywords' => 'online business, ecommerce, entrepreneurship, startup',
                'focus_keyword' => 'start online business',
                'canonical_url' => null,
                'og_image' => '/images/posts/quran-learning-og.jpg',
                'og_title' => 'How to Start a Successful Online Business',
                'og_description' => 'Complete guide to launching your online venture',
                'og_type' => 'article', // Added og_type
                'twitter_card' => 'summary_large_image',
                'status' => 'published',
                'published_at' => now()->subDays(15),
                'scheduled_for' => null,
                'is_featured' => true,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'HowTo',
                    'name' => 'How to Start an Online Business'
                ]),
                'category_id' => $businessId,
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
                'deleted_at' => null,
            ],
            [
                'title' => 'Laravel 11: What\'s New and Exciting',
                'slug' => 'laravel-11-whats-new-exciting',
                'short_description' => 'Explore the latest features and improvements in Laravel 11 framework.',
                'description' => 'Laravel 11 brings exciting new features including simplified application structure, improved performance, and developer experience enhancements. Learn what\'s changed and how to upgrade your projects.',
                'description_html' => '<p>Laravel 11 brings exciting new features including simplified application structure, improved performance, and developer experience enhancements.</p><p>Learn what\'s changed and how to upgrade your projects.</p>',
                'image_url' => '/images/posts/laravel-11.jpg',
                'image_alt' => 'Laravel 11 Features',
                'seo_title' => 'Laravel 11 Features and Updates | What\'s New',
                'seo_description' => 'Discover the latest features in Laravel 11. Learn about simplified structure, performance improvements, and upgrade guide.',
                'seo_keywords' => 'Laravel 11, PHP framework, web development, Laravel features',
                'focus_keyword' => 'Laravel 11 features',
                'canonical_url' => null,
                'og_image' => '/images/posts/laravel-11-og.jpg',
                'og_title' => 'Laravel 11: What\'s New and Exciting',
                'og_description' => 'Explore Laravel 11 latest features and improvements',
                'og_type' => 'article', // Added og_type
                'twitter_card' => 'summary_large_image',
                'status' => 'draft',
                'published_at' => null,
                'scheduled_for' => now()->addDays(7),
                'is_featured' => false,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'TechArticle',
                    'headline' => 'Laravel 11: What\'s New'
                ]),
                'category_id' => $webDevId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}