<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',    
        'description',
        'start_date',
        'end_date',
        'location',
        'cover_image',
        'status',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function ($event) {
            $event->slug = \Illuminate\Support\Str::slug($event->title);
        });

        static::saving(function ($event) {
            if (empty($event->excerpt) && !empty($event->description)) {
                $clean = strip_tags($event->description);
                $plain = html_entity_decode($clean);
                $event->excerpt = \Illuminate\Support\Str::limit(trim($plain), 200);
            }
        });
    }
}
