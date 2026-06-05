<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostCategory extends Model
{
    protected $table = 'post_categories';
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
        'order',
        'parent_id',
        'seo_title',
        'seo_description'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'parent_id' => 'integer',
    ];
    
    // Auto generate slug from name
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
        
        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
    
    // Relationship: Category has many posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
    
    // Get published posts only
    public function publishedPosts()
    {
        return $this->hasMany(Post::class, 'category_id')->where('status', 'published');
    }
    
    // Parent category relationship (for nested categories)
    public function parent()
    {
        return $this->belongsTo(PostCategory::class, 'parent_id');
    }
    
    // Child categories
    public function children()
    {
        return $this->hasMany(PostCategory::class, 'parent_id');
    }
    
    // Scope for active categories only
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    // Scope for parent categories only
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }
    
    // Scope ordered by order field
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('name', 'asc');
    }
    
    // Get posts count attribute
    public function getPostsCountAttribute()
    {
        return $this->posts()->where('status', 'published')->count();
    }
    
    // Get url attribute
    public function getUrlAttribute()
    {
        return route('blog.categories', $this->slug);
    }
}