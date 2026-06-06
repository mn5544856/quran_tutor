<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'content_html',
        'excerpt',
        'image_url',
        'seo_title',
        'seo_description',
        'status',
        'published_at',
        'category_id',
        'views',
        'user_id', // Add this if you have user_id column
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Category relation
    public function category()
    {
        return $this->belongsTo(postCategory::class);
    }

    // Tags relation (many-to-many)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Published scope
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Author relation - Only if User model exists
    public function author()
    {
        // Check if User model exists, otherwise return null
        if (class_exists('App\Models\User')) {
            return $this->belongsTo(User::class, 'user_id');
        }
        return null;
    }
    
    // Alternative: Use this instead of author()
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}