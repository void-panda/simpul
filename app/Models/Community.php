<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
        'vision',
        'mission',
        'founded_at',
        'leader_name',
        'email',
        'phone',
        'address',
        'website',
        'map_embed_url',
        'meta_title',
        'meta_description',
        'landing_custom_html',
    ];
}
