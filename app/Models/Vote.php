<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $fillable = [
        'user_id',
        'album_id',
        'value'
    ];

    public function album(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function upvotes(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->where('value', 'upvote')->count()
        );
    }

    public function downvotes(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->where('value', 'downvote')->count()
        );
    }
}
