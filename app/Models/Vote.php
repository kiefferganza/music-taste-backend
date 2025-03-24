<?php

namespace App\Models;

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
}
