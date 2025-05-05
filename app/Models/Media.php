<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    // media<>news
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
