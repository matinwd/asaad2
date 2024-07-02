<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "گالری تصاویر"],
            ['name' => "فهرست"]
        ];
        $items = Gallery::paginate();
        return view('content.entity.gallery.list', compact('breadcrumbs', 'items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "گالری تصاویر"],
            ['name' => "آلبوم جدید"]
        ];
        return view('content.entity.gallery.add', compact('breadcrumbs'));
    }

    public function store(GalleryRequest $request)
    {
        try {
            $attrs = $request->only(['slug', 'image', 'date', 'active', 'pictures']);
            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $gallery = Gallery::create($attrs);
            alert()
                ->success("آلبوم شما ثبت شد.");
            return redirect()->route('cms.galleries.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("آلبوم شما ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function edit(Gallery $gallery)
    {
        $breadcrumbs = [
            ['link' => route('cms.categories.index'), 'name' => "گالری تصاویر"],
            ['link' => 'javascript:void(0)', 'name' => "ویرایش آلبوم"],
            ['name' => $gallery->title]
        ];
        return view('content.entity.gallery.edit', compact('breadcrumbs', 'gallery'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        try {
            $attrs = $request->only(['slug', 'image', 'date', 'active', 'pictures']);
            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $gallery->update($attrs);
            \App\Helpers\Helper::deleteNoExistsLangs($gallery);
            alert()
                ->success("اطلاعات آلبوم مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.galleries.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اطلاعات آلبوم مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy(Gallery $gallery)
    {
        try {
            $gallery->delete();
            alert()
                ->success("آلبوم مورد نظر حذف شد.");
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("آلبوم مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }
}
