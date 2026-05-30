<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('author')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();      // store path like 'library/cover.jpg'
            $table->string('pdf_file');                      // store path like 'library/book.pdf'
            $table->string('category')->nullable();          // e.g., 'Tafsir', 'Hadith', 'Seerah', 'Fiqh'
            $table->integer('downloads')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};