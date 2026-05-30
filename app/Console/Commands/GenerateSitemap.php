<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Course;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate website sitemap';

    public function handle()
    {
        $courses =  Course::select('slug')->get();
        $sitemap = Sitemap::create();

        // Static pages
        $sitemap->add(Url::create('/'));
        $sitemap->add(Url::create('/courses'));
        $sitemap->add(Url::create('/contact'));
        $sitemap->add(Url::create('/how-it-works'));
        $sitemap->add(Url::create('/free-trial'));

        // Dynamic course pages
        foreach ($courses as $course) {
            $sitemap->add(
                Url::create("/courses/{$course->slug}")
            );
        }

        // Save file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}