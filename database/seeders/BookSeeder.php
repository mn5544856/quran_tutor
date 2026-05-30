<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Tafsir Ibn Kathir (Abridged)',
            'slug' => 'tafsir-ibn-kathir-abridged',
            'author' => 'Ibn Kathir',
            'description' => 'One of the most famous and authentic Tafsir of the Quran.',
            'cover_image' => 'library/covers/ibn-kathir.PNG',
            'pdf_file' => 'library/tafsir-ibn-kathir.pdf',
            'category' => 'Tafsir',
            'is_featured' => true,
        ]);

        Book::create([
            'title' => 'Riyad us-Saliheen',
            'slug' => 'riyad-us-saliheen',
            'author' => 'Imam Nawawi',
            'description' => 'Collection of authentic Hadith on ethics and manners.',
            'cover_image' => 'library/covers/riyad.jpg',
            'pdf_file' => 'library/riyad-us-saliheen.pdf',
            'category' => 'Hadith',
            'is_featured' => true,
        ]);
    }
}