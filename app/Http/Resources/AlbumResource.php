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
            'votes' => VoteResource::collection($this->votes),
            'artist' => $this->artist,
            'cover' => $this->cover,
            'upvotes' => $this->votes->where('value', 'upvote')->count(),
            'downvotes' => $this->votes->where('value', 'downvote')->count(),
            'total_votes' => $this->votes->count(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
