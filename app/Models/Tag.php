<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'type', 'is_active'];
    
    // Posts relationship
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
    
    // Courses relationship
    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }
    
    // Scope for post tags only
    public function scopeForPosts($query)
    {
        return $query->whereIn('type', ['post', 'both']);
    }
    
    // Scope for course tags only
    public function scopeForCourses($query)
    {
        return $query->whereIn('type', ['course', 'both']);
    }
}