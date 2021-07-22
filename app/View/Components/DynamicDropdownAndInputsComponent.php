<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\ContentType;

class DynamicDropdownAndInputsComponent extends Component
{
    public $dropdownData;
    public $section;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($section = '')
    {
        //
        $contentTypes = ContentType::all();
        $this->section = $section;
        $this->dropdownData = $contentTypes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dynamic-dropdown-and-inputs-component');
    }
}
