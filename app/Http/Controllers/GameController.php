<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tag;
use App\Providers\RouteServiceProvider;
use App\Services\ProfanityFilter;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // Retrieve all games
    public function index()
    {
        $games = Game::query()
            ->with([
                'creator',
                'tags' => function ($query) {
                    $query->select('tags.id', 'tags.name', 'tags.description');
                },
                'media',
            ])
            ->isReleased()
            ->orderBy('release_date', 'desc')
            ->get();

        return view('games.index', ['games' => $games]);
    }

    // Create a new game
    public function store(Request $request)
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

        // Associate tags with the game
        $game->tags()->attach($this->genTagsFromRequest($request));

        if ($request->hasFile('image')) {
            $game->addMediaFromRequest('image')->toMediaCollection();
        }

        session()->flash('success_notification', "Game '{$game->title}' created.");

        return redirect()->route('games.manage', $game);
    }

    public function create()
    {
        $tags = Tag::all();

        return view('games.manage', ['game' => null, 'tags' => $tags]);
    }

    // Retrieve a specific game
    public function show(Game $game)
    {
        return view('games.show', ['game' => $game]);
    }

    public function manage(Game $game)
    {
        $tags = Tag::all();

        return view('games.manage', ['game' => $game, 'tags' => $tags]);
    }

    // Update a game
    public function update(Request $request, Game $game)
    {

        $profanityFilter = new ProfanityFilter();

        // Associate tags with the game
        $game->update([
            'title' => $profanityFilter->filter($request->input('title')),
            'description' => $profanityFilter->filter($request->input('description')),
            'release_date' => $request->input('published') != null ? now() : null,
            'download_url' => $request->input('download_url'),
        ]);

        $game->tags()->detach();
        $game->tags()->attach($this->genTagsFromRequest($request));

        if ($request->hasFile('image')) {
            $game->clearMediaCollection();
            $game->addMediaFromRequest('image')->toMediaCollection();
        }

        session()->flash('success_notification', "Game '{$game->title}' updated.");

        return redirect()->route('games.manage', $game);
    }

    // Delete a game
    public function destroy(Request $request, Game $game)
    {
        $user = $request->user();

        if (!$user->is_admin && $user->id != $game->creator_id) {
            abort(403);
        }

        $game->delete();

        session()->flash('success_notification', "Game '{$game->title}' deleted.");

        return redirect(RouteServiceProvider::HOME);
    }

    public function genTagsFromRequest(Request $request)
    {
        // Extract tags from the request (assuming tags are sent as an array)
        $tagsData = $request->input('create_tags', []);
        $selectedTagsString = $request->input('selected_tags', '');
        $selectedTags = $selectedTagsString ? explode(' ', $selectedTagsString) : [];

        // Create or find tags and associate them with the game
        $tags = $selectedTags;
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

        return $tags;
    }
}
