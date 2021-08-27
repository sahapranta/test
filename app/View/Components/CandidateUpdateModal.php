<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CandidateUpdateModal extends Component
{
    public $candidate;
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($candidate, $categories)
    {
        $this->candidate = $candidate;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.candidate-update-modal');
    }
}
