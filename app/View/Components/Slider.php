<?php

namespace App\View\Components;

use App\Models\Slide;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $slides = Slide::query()
            ->orderBy('position')
            ->where('active',true)
            ->get();
        return view('components.slider_old',compact('slides'));
    }
}
