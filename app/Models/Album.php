<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    use HasFactory;
    protected $fillable = [
      'name',
      'artist',
      'cover',
    ];

    public function votes(): \Illuminate\Database\Eloquent\Relations\HasMany|Album
    {
        return $this->hasMany(Vote::class);
    }
}
