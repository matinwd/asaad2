<?php

namespace App\View\Components;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Post;
use Illuminate\View\Component;

class BlogSideBar extends Component
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
        $categories = Category::translatedIn(app()->getLocale())->get();
        $recentlyPosts = Post::latest()
            ->translatedIn(app()->getLocale())
            ->limit(3)->get();
        $tags = explode(',',Helper::Setting('tags')->val);
        return view('components.blog-side-bar',compact('categories','recentlyPosts','tags'));
    }
}
