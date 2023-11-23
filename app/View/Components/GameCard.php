<?php

namespace App\View\Components;

use App\Models\Game;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameCard extends Component
{
    public Game $game;

    public bool $big;

    /**
     * Create a new component instance.
     */
    public function __construct(Game $game = null, bool $big = false)
    {
        $this->game = $game;
        $this->big = $big;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-card');
    }
}
