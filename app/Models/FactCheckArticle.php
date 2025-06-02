<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactCheckArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'claim_excerpt',
        'full_content',
        'verdict',
        'source_name',
        'source_link',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}