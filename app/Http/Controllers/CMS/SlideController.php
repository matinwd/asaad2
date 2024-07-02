<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تنظیمات"],
            ['link' => "javascript:void(0)", 'name' => "اسلایدر"],
            ['name' => "فهرست"]
        ];
        $items = Slide::query()
            ->orderBy('position')
            ->paginate();
        return view('content.entity.slide.list', compact('breadcrumbs', 'items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تنظیمات"],
            ['link' => "javascript:void(0)", 'name' => "اسلایدر"],
            ['name' => "اسلاید جدید"]
        ];
        return view('content.entity.slide.add', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        try {
            $attrs = $request->only(['name', 'image', 'url', 'type','position', 'active']);
            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            safeUrls($attrs['url']);
            $slide = Slide::create($attrs);
            alert()
                ->success("اسلاید شما ثبت شد.");
            return redirect()->route('cms.slides.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اسلاید شما ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function edit(Slide $slide)
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تنظیمات"],
            ['link' => route('cms.categories.index'), 'name' => "اسلایدر"],
            ['link' => 'javascript:void(0)', 'name' => "ویرایش اسلاید"],
            ['name' => $slide->name]
        ];
        return view('content.entity.slide.edit', compact('breadcrumbs', 'slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        try {
            $attrs = $request->only(['name', 'image', 'url', 'type','position', 'active']);
            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            safeUrls($attrs['url']);
            $slide->update($attrs);
            alert()
                ->success("اطلاعات اسلاید مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.slides.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اطلاعات اسلاید مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy(Slide $slide)
    {
        try {
            $slide->delete();
            alert()
                ->success("اسلاید مورد نظر حذف شد.");
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اسلاید مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }
}
