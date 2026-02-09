<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class FrontLayout extends Component
{
    public $navbarClass;
    public $lightHero;

    public function __construct($navbarClass = null, $lightHero = false)
    {
        $this->navbarClass = $navbarClass ?? 'bg-transparent bg-gradient-to-b from-black/80 to-transparent';
        $this->lightHero = $lightHero;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.front');
    }
}
