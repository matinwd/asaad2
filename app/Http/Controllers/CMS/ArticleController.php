<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "آموزش/مقالات"],
            ['name' => "فهرست"]
        ];
        $items = Article::paginate();
        return view('content.entity.article.list', compact('breadcrumbs', 'items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "آموزش/مقالات"],
            ['name' => "مقاله جدید"]
        ];
        return view('content.entity.article.add', compact('breadcrumbs'));
    }

    public function store(ArticleRequest $request)
    {
        try {
            $attrs = $request->only(['slug', 'date', 'pictures']);
            foreach ($request->get('has_lang') ?? [] as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $article = Article::create($attrs);
            alert()
                ->success("مقاله شما ثبت شد.");
            return redirect()->route('cms.articles.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("مقاله شما ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function show(Article $article)
    {
        $breadcrumbs = [
            ['link' => route('cms.articles.index'), 'name' => "آموزش/مقالات"],
            ['name' => "مشاهده"]
        ];
        return view('content.entity.article.details', compact('breadcrumbs', 'article'));
    }

    public function edit(Article $article)
    {
        $breadcrumbs = [
            ['link' => route('cms.categories.index'), 'name' => "آموزش/مقالات"],
            ['link' => "javascript:void(0)", 'name' => "ویرایش مقاله"],
            ['name' => $article->title]
        ];
        return view('content.entity.article.edit', compact('breadcrumbs', 'article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        try {
            $attrs = $request->only(['slug', 'category_id', 'date', 'status', 'pictures']);
            foreach ($request->get('has_lang') ?? [] as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $article->update($attrs);
            \App\Helpers\Helper::deleteNoExistsLangs($article);
            alert()
                ->success("اطلاعات مقاله مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.articles.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اطلاعات مقاله مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy(Article $article)
    {
        try {
            $article->delete();
            alert()
                ->success("مقاله مورد نظر حذف شد.");
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("مقاله مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }
}
