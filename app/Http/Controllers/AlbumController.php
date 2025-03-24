<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $query = Album::withCount([
            'votes as vote_count' => function ($query) {
                $query->select(DB::raw('COALESCE(SUM(CASE WHEN value = "upvote" THEN 1 WHEN value = "downvote" THEN -1 ELSE 0 END), 0)'));
            }
        ]);

        $search = $request->search;
        if($search){
            $query->where('name' , 'like', "%$search%");
        }

        // Ensure upvotes is treated as a numeric value, preventing NULL issues
        $query = $query->orderBy('vote_count')
            ->orderBy('name')
            ->paginate(10);
        return AlbumResource::collection($query);
    }

    public function store(AlbumRequest $request)
    {
        return new AlbumResource(Album::create($request->validated()));
    }

    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $album->update($request->validated());

        return new AlbumResource($album);
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json();
    }
}
