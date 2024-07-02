<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "دسته بندی"],
            ['name' => "فهرست"]
        ];
        $items = Category::paginate();
        return view('content.entity.category.list',compact('breadcrumbs','items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "دسته بندی"],
            ['name' => "دسته بندی جدید"]
        ];
        return view('content.entity.category.add',compact('breadcrumbs'));
    }

    public function store(CategoryRequest $request)
    {
        try{
            $attrs = $request->only(['slug']);
            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $category = Category::create($attrs);
            alert()
                ->success("دسته بندی مورد نظر ثبت شد.");
            return redirect()->route('cms.categories.index');
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("دسته بندی مورد نظر ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function edit(Category $category)
    {
        $breadcrumbs = [
            ['link' => route('cms.categories.index'), 'name' => "دسته بندی"],
            ['link' => "javascript:void(0)", 'name' => "ویرایش دسته بندی"],
            ['name' => $category->title]
        ];
        return view('content.entity.category.edit',compact('breadcrumbs','category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try{
            $attrs = $request->only(['slug']);
            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $category->update($attrs);
            alert()
                ->success("اطلاعات دسته بندی مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.categories.index');
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("اطلاعات دسته بندی مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy(Category $category)
    {
        try{
            $category->delete();
            alert()
                ->success("دسته بندی مورد نظر حذف شد.");
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("دسته بندی مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }
}
