<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameApiRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\ProfanityFilter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $games = Game::paginate($perPage);

        return GameResource::collection($games);
    }

    public function show(Game $game)
    {
        return new GameResource($game);
    }

    public function store(GameApiRequest $request)
    {
        $current_user = $request->user();
        $profanityFilter = new ProfanityFilter();

        // Create the game
        $game = Game::create([
            'title' => $profanityFilter->filter($request->input('title')),
            'description' => $profanityFilter->filter($request->input('description')),
            'release_date' => $request->input('released') != null ? now() : null,
            'creator_id' => $current_user->id,
            'download_url' => $request->input('download_url'),
        ]);

        $game->tags()->attach($request->input('tags') ?? []);

        if ($request->hasFile('image')) {
            $game->addMediaFromRequest('image')->toMediaCollection();
        }

        return new GameResource($game);
    }

    public function update(GameApiRequest $request, Game $game)
    {
        $profanityFilter = new ProfanityFilter();

        // Create the game
        $game->update([
            'title' => $profanityFilter->filter($request->input('title')),
            'description' => $profanityFilter->filter($request->input('description')),
            'release_date' => $request->input('released') != null ? now() : null,
            'download_url' => $request->input('download_url'),
        ]);

        $game->tags()->detach();
        $game->tags()->attach($request->input('tags') ?? []);

        if ($request->hasFile('image')) {
            $game->clearMediaCollection();
            $game->addMediaFromRequest('image')->toMediaCollection();
        }

        return new GameResource($game);
    }

    // Delete a tag
    public function destroy(Game $game)
    {
        $game->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
