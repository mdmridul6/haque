<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackButton extends Component
{

    public $href;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $title = 'Go Back')
    {
        $this->href = $href;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.back-button');
    }
}
