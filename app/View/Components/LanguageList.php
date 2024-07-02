<?php

namespace App\View\Components;

use App\Models\Language;
use Illuminate\View\Component;

class LanguageList extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $list = \App\Helpers\Helper::activeLanguages();
        return view('components.language-list',compact('list'));
    }
}
