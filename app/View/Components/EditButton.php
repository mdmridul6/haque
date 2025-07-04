<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditButton extends Component
{
        public $href;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $title = 'Edit')
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
        return view('components.edit-button');
    }
}
