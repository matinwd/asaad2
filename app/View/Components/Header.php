<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class Header extends Component
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
        $menu = Menu::where('name','header')->firstOrFail();
        return view('components.header',compact('menu'));
    }
}
