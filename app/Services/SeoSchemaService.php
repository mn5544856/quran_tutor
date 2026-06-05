<?php

namespace App\Services;

class SeoSchemaService
{
    public static function organization(): array
    {
        return [
            '@type' => 'Organization',
            '@id' => 'https://ilmequran.com/#organization',
            'name' => 'Ilm e Quran',
            'url' => 'https://ilmequran.com/',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://ilmequran.com/images/logo.svg'
            ]
        ];
    }
     /**
     * COURSE LIST (ALL COURSES PAGE)
     */
    public static function courses($courses): array
    {
       
        return [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            '@id' => 'https://ilmequran.com/#courses',
            'name' => 'Online Quran Courses',
            'itemListElement' => $courses->map(function ($course, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'item' => [
                        '@type' => 'Course',
                        '@id' => url('/courses/' . $course->slug),
                        'name' => $course->title,
                        'description' => $course->short_description,
                        'url' => url('/courses/' . $course->slug),
                        'provider' => self::organization()
                    ]
                ];
            })->values()->toArray(),
        ];
    }
    public static function course(string $name, string $description, string $slug): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Course',
            '@id' => "https://ilmequran.com/#course-$slug",
            'name' => $name,
            'description' => $description,
            'url' => "https://ilmequran.com/courses/$slug",
            'provider' => [
                '@type' => 'Person',
                'name' => 'Hafiz AbdulWaheed',
                'url' => 'https://ilmequran.com'
            ]
        ];
    }
}