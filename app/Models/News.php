<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'category',
        'content',
        'cover_image',
        'published_at',
    ];

    protected static function booted()
    {
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });

        static::saving(function ($news) {
            if (empty($news->excerpt) && !empty($news->content)) {
                // Convert any HTML/Markdown to plain text
                $clean = strip_tags($news->content); // bersihin HTML
                $plain = html_entity_decode($clean); // decode & strip entity
                $news->excerpt = Str::limit(trim($plain), 200);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
