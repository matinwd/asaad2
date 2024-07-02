<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function category(Category $category)
    {

        SEOTools::setTitle($category->title);
        SEOTools::setDescription('Posts of ' . $category->title);
        SEOMeta::addKeyword('categories,categories of my Ductcen,Ductcen');


        abort_unless($category->hasTranslation(app()->getLocale()),404);
        $posts = $category->posts()->latest()->translatedIn(app()->getLocale())->where(Post::getClosure())->paginate(9);
        return view('pages.posts', compact('posts','category'));
    }

    public function index()
    {
        SEOTools::setTitle('All Categories');
        SEOTools::setDescription('You can see all of Ductcen categories here');
        SEOMeta::addKeyword('categories,categories of my Ductcen');


        $posts = Post::latest()
            ->translatedIn(app()->getLocale())
            ->where(Post::getClosure())->paginate(9);
        return view('pages.posts', compact('posts'));
    }

    public function show(Post $post)
    {
        SEOTools::setTitle($post->title);
        SEOTools::setDescription('Products and Posts of ' . $post->details);
        SEOMeta::addKeyword($post->tags);

        $recentPosts = Post::latest()->translatedIn(app()->getLocale())->take(4)->get();
        $categories = Category::latest()->take(6)->get();
        $comments = Comment::where('parent_id',null)->where('post_id',$post->id)->get();
        abort_unless($post->hasTranslation(app()->getLocale()),404);
        return view('pages.post-detail', compact('post','recentPosts','categories','comments'));
    }


}
