<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayout extends Component
{
    public string $title;

    public function __construct(string $title = 'Destore')
    {
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('components.site-layout');
    }
}
