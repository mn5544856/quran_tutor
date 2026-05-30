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
        'level',
        'duration',
        'price',
        'image_url',
        'category',
        'is_featured',
        'what_you_learn',
        'requirements',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'float',
        'what_you_learn' => 'array',
    ];

    /*
    |---------------------------------------
    | SCOPES
    |---------------------------------------
    */

    // Featured courses
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Filter by category
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Filter by level
    public function scopeLevel($query, $level)
    {
        return $query->where('level', $level);
    }
}