<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'description',
        'cover_image',
        'pdf_file',
        'category',
        'downloads',
        'is_featured'
    ];

    /*
    |--------------------------------------------------------------------------
    | Route Model Binding
    |--------------------------------------------------------------------------
    */

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*
    |--------------------------------------------------------------------------
    | Auto Generate Slug
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($book) {

            if (empty($book->slug)) {

                $slug = Str::slug($book->title);

                $count = Book::where('slug', 'LIKE', "{$slug}%")->count();

                $book->slug = $count
                    ? "{$slug}-{$count}"
                    : $slug;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor for Cover Image URL
    |--------------------------------------------------------------------------
    */

    public function getCoverUrlAttribute()
    {
        return $this->cover_image
            ? asset('storage/' . $this->cover_image)
            : asset('storage/library/default-cover.jpg');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor for PDF URL
    |--------------------------------------------------------------------------
    */

    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->pdf_file);
    }

    /*
    |--------------------------------------------------------------------------
    | Increment Download Count
    |--------------------------------------------------------------------------
    */

    public function incrementDownloads()
    {
        $this->increment('downloads');
    }
}