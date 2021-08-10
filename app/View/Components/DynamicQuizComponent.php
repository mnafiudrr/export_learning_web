<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DynamicQuizComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $quisContent;
    public function __construct($quisContent = null)
    {
        //
        $this->quisContent = $quisContent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dynamic-quiz-component');
    }
}
