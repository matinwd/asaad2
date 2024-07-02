<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()
            ->translatedIn(app()->getLocale())
            ->paginate(9);
        return view('front.blog.articles', compact('articles'));
    }

    public function show(Article $article)
    {
        abort_unless($article->hasTranslation(app()->getLocale()),404);
        return view('front.blog.article_detail', compact('article'));
    }
}
