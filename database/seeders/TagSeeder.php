<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            // Post tags
            ['name' => 'Technology', 'type' => 'post'],
            ['name' => 'News', 'type' => 'post'],
            ['name' => 'Tutorial', 'type' => 'post'],
            
            // Course tags
            ['name' => 'Web Development', 'type' => 'course'],
            ['name' => 'Data Science', 'type' => 'course'],
            ['name' => 'Marketing', 'type' => 'course'],
            
            // Both
            ['name' => 'Laravel', 'type' => 'both'],
            ['name' => 'PHP', 'type' => 'both'],
            ['name' => 'JavaScript', 'type' => 'both'],
            // ['name' => 'Quran', 'type' => 'both'],
        ];
        
        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag['name'],
                'slug' => Str::slug($tag['name']),
                'type' => $tag['type'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}