<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class LanguageController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تنظیمات"],
            ['link' => "javascript:void(0)", 'name' => "زبان ها"],
            ['name' => "فهرست"]
        ];
        $items = Language::paginate();
        return view('content.entity.language.list', compact('breadcrumbs', 'items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تنظیمات"],
            ['link' => "javascript:void(0)", 'name' => "زبان ها"],
            ['name' => "زبان جدید"]
        ];
        return view('content.entity.language.add', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        try {
            $attrs = $request->only(['name', 'code', 'direction', 'active']);
            $language = Language::create($attrs);
            alert()
                ->success("زبان شما ثبت شد.");
            cache()->forget('languages-active');
            return redirect()->route('cms.languages.index');
        } catch (\Exception $exception) {
            alert()
                ->error("زبان شما ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function edit(Language $language)
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تنظیمات"],
            ['link' => route('cms.languages.index'), 'name' => "زبان ها"],
            ['link' => 'javascript:void(0)', 'name' => "ویرایش زبان"],
            ['name' => $language->name]
        ];
        return view('content.entity.language.edit', compact('breadcrumbs', 'language'));
    }

    public function update(Request $request, Language $language)
    {
        try {
            $attrs = $request->only(['name', 'code', 'direction', 'active']);

            if ($language->code == "fa" || $language->code == "en")
                unset($attrs['code']);

            $language->update($attrs);
            alert()
                ->success("اطلاعات زبان مورد نظر بروزرسانی شد.");
            cache()->forget('languages-active');
            return redirect()->route('cms.languages.index');
        } catch (\Exception $exception) {
            alert()
                ->error("اطلاعات زبان مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy(Language $language)
    {
        try {
            if ($language->code == "fa" || $language->code == "en") {
                alert()
                    ->error("عملیات غیرمجاز !!");
                return back();
            }
            $language->delete();
            alert()
                ->success("زبان مورد نظر حذف شد.");
            cache()->forget('languages-active');
        } catch (\Exception $exception) {
            alert()
                ->error("زبان مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }

    public function config()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تنظیمات"],
            ['name' => "ترجمه کلمات"]
        ];
        $groups = LanguageLine::all()->groupBy('group');
        return view('content.entity.localization', compact('breadcrumbs', 'groups'));
    }

    public function updateL(Request $request)
    {
        try {
            foreach ($request->get('text') as $index => $item) {
                $arr = explode('.',$index);
                $group = $arr[0] ?? null;
                $key = $arr[1] ?? null;
                LanguageLine::updateOrCreate([
                    'group' => $group,
                    'key' => $key,
                ],['text' => $item]);
            }
            alert()
                ->success("عملیات بروزرسانی انجام شد.");
            return back();
        } catch (\Exception $exception) {
            alert()
                ->error("اطلاعات مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

}
