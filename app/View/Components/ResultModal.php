<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ResultModal extends Component
{
    public $candidates;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($candidates, $id)
    {
        $this->candidates = $candidates;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.result-modal');
    }
}
