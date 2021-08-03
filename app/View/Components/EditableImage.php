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
    public $fileInputName;
    public $imgId;

    public $isSrcUrl;

    public function __construct(String $imgId, String $imgSrc = '', $fileInputName = 'image', $isSrcUrl = false)
    {
        $this->isSrcUrl = $isSrcUrl;
        $this->imgSrc = $imgSrc;
        if (filter_var($imgSrc, FILTER_VALIDATE_URL)) {
            // dd($imgSrc);
            $this->isSrcUrl = true;
        } else {
            $this->imgSrc = str_replace('public', '', $imgSrc);
            // my else codes goes
        }


        $this->fileInputName = $fileInputName;
        $this->imgId = $imgId;
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
