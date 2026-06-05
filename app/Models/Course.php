<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'duration',
        'price',
        'image_url',
        'category_id',
        'is_featured',
        'what_you_learn',
        'requirements',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'float',
        'what_you_learn' => 'array',
    ];

    // Featured courses scope
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Filter by category slug
    public function scopeCategorySlug($query, $slug)
    {
        return $query->whereHas('category', function ($q) use ($slug) {
            $q->where('slug', $slug);
        });
    }

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}