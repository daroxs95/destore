<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Faker\Factory as Faker;

class GameController extends Controller
{
    // Retrieve all games
    public function index(bool $renderUI = false)
    {
        $games = Game::with(['tags' => function ($query) {
            $query->select('tags.id', 'tags.name', 'tags.description');
        }])->get();

        if ($renderUI) {
            return view('games-list', ['games' => $games]);
        }

        return response()->json($games, 200);
    }

    public
    function indexUI()
    {
        return self::index(true);
    }

// Create a new game
    public
    function store(Request $request)
    {
        // Validate other fields (name, description, release_date, etc.)

        // Extract tags from the request (assuming tags are sent as an array)
        $tagsData = $request->input('tags', []);

        // Create or find tags and associate them with the game
        $tags = [];
        foreach ($tagsData as $tagData) {
            $tag = Tag::firstOrCreate([
                'name' => $tagData['name'],
            ]);

            // If description is provided, update the tag's description
            if (isset($tagData['description'])) {
                $tag->update(['description' => $tagData['description']]);
            }

            $tags[] = $tag->id;
        }

        // Create the game
        $game = Game::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'release_date' => $request->input('release_date'),
            // Other game fields
        ]);

        // Associate tags with the game
        $game->tags()->attach($tags);

        // Return a response (e.g., success message or redirect)
        return response()->json($game, 201);
    }

// Retrieve a specific game
    public
    function show(Game $game)
    {
        return response()->json($game);
    }

// Update a game
    public
    function update(Request $request, Game $game)
    {
        $game->update($request->all());
        return response()->json($game);
    }

// Delete a game
    public
    function destroy(Game $game)
    {
        $game->delete();
        return response()->json(null, 204);
    }
}
