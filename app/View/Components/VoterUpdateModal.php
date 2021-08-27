<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VoterUpdateModal extends Component
{
    public $voter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($voter)
    {
        $this->voter = $voter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.voter-update-modal');
    }
}
