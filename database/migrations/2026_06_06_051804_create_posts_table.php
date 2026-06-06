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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->longText('description_html')->nullable(); // HTML processed content
            
            // Featured Image
            $table->string('image_url')->nullable();
            $table->string('image_alt')->nullable(); // Alt text for image SEO
            
            // SEO Fields
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('focus_keyword')->nullable();
            $table->string('canonical_url')->nullable(); // Avoid duplicate content
            $table->string('og_image')->nullable(); // Social media share image
            $table->string('og_title')->nullable(); // Social media title
            $table->string('og_type')->nullable(); // Social media type (article, website, etc.)
            $table->text('og_description')->nullable(); // Social media description
            $table->string('twitter_card')->nullable(); // Twitter card type
            
            // Status & Publishing (Blog specific)
            $table->enum('status', ['draft', 'published', 'pending', 'archived', 'scheduled'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('scheduled_for')->nullable(); // Schedule future publish
            // view
            $table->unsignedBigInteger('views')->default(0);
            // Post Features
            $table->boolean('is_featured')->default(false);
            // Post specific fields
            $table->json('schema_markup')->nullable(); // JSON-LD structured data
            
            // Foreign keys
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('post_categories')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            
            $table->softDeletes(); // Soft delete support
            $table->timestamps();

            // Indexes for better performance
            $table->index('is_featured');
            $table->index('status');
            $table->index('published_at');
            $table->index('category_id');
            $table->index(['is_featured', 'published_at']);
            $table->fullText(['title', 'description', 'short_description']); // Full text search
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};