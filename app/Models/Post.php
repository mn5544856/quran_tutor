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
        'featured_image',
        'seo_title',
        'seo_description',
        'status',
        'published_at',
        'category_id',
        'views'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Category relation
    public function category()
    {
        return $this->belongsTo(Category::class);
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
}