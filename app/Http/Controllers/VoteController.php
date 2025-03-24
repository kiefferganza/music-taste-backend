<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Http\Resources\VoteResource;
use App\Models\Album;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        return VoteResource::collection(Vote::all());
    }

    public function store(Request $request,Album $album)
    {
        return new VoteResource(Vote::updateOrCreate(
            ['user_id' => Auth::id(), 'album_id' => $album->id],
            ['value' => $request->value]
        ));
    }

    public function show(Vote $vote)
    {
        return new VoteResource($vote);
    }

    public function update(VoteRequest $request, Vote $vote)
    {
        $vote->update($request->validated());

        return new VoteResource($vote);
    }

    public function destroy(Vote $vote)
    {
        $vote->delete();

        return response()->json();
    }
}
