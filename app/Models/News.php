<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class News extends Model
{
    // news<>media
    // public function media(): HasMany
    // {
    //     return $this->hasMany(Media::class);
    // }

    // news<>media
    // public function category(): HasOneOrMany
    // {
    //     return $this->hasOnOrMany(Media::class);
    // }
    
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
    'content_news',
    'image',
    'published_at',
];

}

