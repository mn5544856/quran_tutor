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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->string('duration')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('image_url')->nullable();
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('course_categories')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            $table->boolean('is_featured')->default(false);
            $table->json('what_you_learn')->nullable();
            $table->text('requirements')->nullable();
            $table->timestamps();

            // Add indexes for better performance
            $table->index('is_featured');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};