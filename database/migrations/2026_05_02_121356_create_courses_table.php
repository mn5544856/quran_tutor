<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description');
            $table->longText('description');

            $table->string('level'); // beginner, intermediate, advanced
            $table->string('duration')->nullable();

            $table->decimal('price', 10, 2)->nullable();

            $table->string('image_url')->nullable();

            $table->string('category'); // quran-basics, tajweed, hifz

            $table->boolean('is_featured')->default(false);

            $table->json('what_you_learn')->nullable();

            $table->text('requirements')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};