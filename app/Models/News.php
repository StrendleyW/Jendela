<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class News extends Model
{
    protected static function boot()
{
    parent::boot();

    static::creating(function ($news) {
        $news->slug = Str::slug($news->title);
    });
}

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $fillable = [
    'title',
    'slug',
    'writer',
    'name',
    'content_news',
    'image',
    'image_caption',
    'video_url',
    'published_at',
    'is_top_pick',

    
];


public function category()
{
    return $this->belongsTo(Category::class);
}

}

