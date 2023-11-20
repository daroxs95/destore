<?php

namespace App\View\Components;

use App\Models\Game;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameCard extends Component
{
    public Game $game;

    /**
     * Create a new component instance.
     */
    public function __construct(Game $game = null)
    {
        $this->game = $game;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-card');
    }
}
