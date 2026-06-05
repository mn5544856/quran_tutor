<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $table = 'course_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // Relation: One category has many courses
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}