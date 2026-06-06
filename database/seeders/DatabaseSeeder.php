<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CourseCategorySeeder::class,
            CourseSeeder::class,
            PostSeeder::class,
            PostCategorySeeder::class,
            TagSeeder::class,
        ]);
    }
}