<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            $table->text('short_description');
            $table->longText('description');
            $table->string('publisher')->nullable();
            $table->string('cover_image')->nullable(); // Book cover image
            $table->string('pdf_file')->nullable(); // E-book PDF file
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('book_categories')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            // Add indexes for better performance
            $table->index('is_featured');
            $table->index('author');
            $table->index(['category_id', 'is_featured']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};