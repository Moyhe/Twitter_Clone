<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Tweet extends Model
{
    use HasFactory;

    /**
     * Get the tweets that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tweets(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
