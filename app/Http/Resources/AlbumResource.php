<?php

namespace App\Http\Resources;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Album */
class AlbumResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'votes' => $this->votes,
            'artist' => $this->artist,
            'cover' => $this->cover,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
