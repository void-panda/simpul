<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /** @use HasFactory<\Database\Factories\PartnersFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
    ];
}
