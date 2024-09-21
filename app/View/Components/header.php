<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    public $title;
    public $addLink;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $addLink = null)
    {
        $this->title = $title;
        $this->addLink = $addLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('backend.partials.header');
    }
}
