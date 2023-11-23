<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\Cache;

class Landing extends Controller
{
    public function index()
    {
        $topGames = Cache::remember('landing.topGames', 3600, function () {
            return Game::withCount('comments')
                ->orderBy('comments_count', 'desc')
                ->take(7)
                ->get();
        });

        return view('landing', compact('topGames'));
    }
}
