<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function handle(Request $request)
    {
        $posts = Post::where(Post::getClosure())->paginate(9);

        $products = Product::where(Product::getClosure())->paginate(9);

        SEOTools::setTitle(trans('search_modal.results_for') .' '. request('q'));
        SEOTools::setDescription(trans('search_modal.results_for') .' '. request('q'));
        SEOMeta::setKeywords(trans('search_modal.results_for') .' '. request('q'));

        return view('pages.search',compact('posts','products'));
    }

}
