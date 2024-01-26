<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Component;

class Games extends Component
{
    public $search = '';

    public function render()
    {
        if ($this->search == '') {
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

            return view('livewire.games', [
                'games' => $games,
            ]);
        }

        $games = Game::query()
            ->with([
                'creator',
                'tags' => function ($query) {
                    $query->select('tags.id', 'tags.name', 'tags.description');
                },
                'media',
            ])
            ->isReleased()
            ->where('title', 'like', '%'.$this->search.'%')
            ->orderBy('release_date', 'desc')
            ->get();

        return view('livewire.games', [
            'games' => $games,
        ]);
    }
}
