<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryUpdateModal extends Component
{
    public $cat;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cat)
    {
        $this->cat = $cat;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-update-modal');
    }
}
