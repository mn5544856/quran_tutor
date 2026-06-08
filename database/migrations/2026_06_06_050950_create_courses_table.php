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
            $table->longText('description_html');

            $table->decimal('price', 10, 2)->nullable();
            $table->string('duration')->nullable();
            $table->string('image_url')->nullable();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('course_categories')
                ->nullOnDelete();

            $table->boolean('is_featured')->default(false);

            $table->json('what_you_learn')->nullable();
            $table->text('requirements')->nullable();

            // SEO Fields
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->string('focus_keyword')->nullable();
            // Open Graph Fields
            $table->string('og_title');
            $table->text('og_description');
            $table->string('og_image_url')->nullable();
            $table->string('twitter_card')->nullable();
            // NOTE: Interface mein cononical_url likha hua hai
            $table->string('cononical_url')->nullable();

            $table->longText('schema_markup')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('is_featured');
            $table->index('deleted_at');
            $table->index('created_at');
            $table->index('category_id');
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