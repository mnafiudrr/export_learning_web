<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditableImage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $imgSrc;
    public function __construct(String $imgSrc)
    {

        $this->imgSrc = $imgSrc;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.editable-image');
    }
}
