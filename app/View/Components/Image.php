<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $imgSrc;

    public $isSrcUrl;

    public $imgId;
    public function __construct(String $imgSrc = '', $imgId = 'currentImage', $isSrcUrl = false)
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

        $this->imgId = $imgId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image');
    }
}
