<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public array $menu_items;

    public array $admin_menu_items;

    public function __construct()
    {
        $this->menu_items = [
            ['label' => 'Games', 'route' => 'games.index', 'url' => null],
        ];

        $this->admin_menu_items = [
            ['label' => 'Creators', 'route' => 'users.index', 'url' => null],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
