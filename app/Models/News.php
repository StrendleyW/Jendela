<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class News extends Model
{
    // news<>media
    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    // news<>media
    public function category(): HasOneOrMany
    {
        return $this->hasOnOrMany(Media::class);
    }
}

