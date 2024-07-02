<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "اخبار"],
            ['name' => "فهرست"]
        ];
        $items = Post::paginate();
        return view('content.entity.post.list', compact('breadcrumbs', 'items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "خبر"],
            ['name' => "خبر جدید"]
        ];
        $categories = Category::all();
        return view('content.entity.post.add', compact('breadcrumbs', 'categories'));
    }

    public function store(PostRequest $request)
    {
        try {
            $attrs = $request->only(['slug', 'category_id', 'date', 'status', 'pictures']);
            foreach ($request->get('has_lang') ?? [] as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $post = Post::create($attrs);
            alert()
                ->success("خبر شما ثبت شد.");
            return redirect()->route('cms.posts.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("خبر شما ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function show(Post $post)
    {
        $breadcrumbs = [
            ['link' => route('cms.posts.index'), 'name' => "اخبار"],
            ['name' => "مشاهده"]
        ];
        return view('content.entity.post.details', compact('breadcrumbs', 'post'));
    }

    public function edit(Post $post)
    {
        $breadcrumbs = [
            ['link' => route('cms.categories.index'), 'name' => "اخبار"],
            ['link' => "javascript:void(0)", 'name' => "ویرایش خبر"],
            ['name' => $post->title]
        ];
        $categories = Category::all();
        return view('content.entity.post.edit',compact('breadcrumbs','post','categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        try{
            $attrs = $request->only(['slug', 'category_id', 'date', 'status', 'pictures']);
            foreach ($request->get('has_lang') ?? [] as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $post->update($attrs);
            \App\Helpers\Helper::deleteNoExistsLangs($post);
            alert()
                ->success("اطلاعات خبر مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.posts.index');
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("اطلاعات خبر مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy(Post $post)
    {
        try{
            $post->delete();
            alert()
                ->success("خبر مورد نظر حذف شد.");
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("خبر مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }
}
