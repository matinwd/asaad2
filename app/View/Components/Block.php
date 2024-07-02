<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Block extends Component
{
    public $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $block = $this->data;
        $data = $block['data'];

        $view = "components.block.{$block['name']}";
        return view()->exists($view) ? view($view,compact('data')) : null;
    }
}
