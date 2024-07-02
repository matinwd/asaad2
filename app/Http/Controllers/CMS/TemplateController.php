<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "صفحه ساز"],
            ['name' => "فهرست"]
        ];
        $items = Template::paginate();
        return view('content.entity.template.list', compact('breadcrumbs', 'items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => route('cms.templates.index'), 'name' => "صفحه ساز"],
            ['name' => "صفحه جدید"]
        ];
        return view('content.entity.template.add', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        try {
            $attrs = array_merge($request->only(['name', 'slug', 'active']), $request->only(config('translatable.locales')));
            $template = Template::create($attrs);
            alert()
                ->success("صفحه جدید ثبت شد.");
            return redirect()->route('cms.templates.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("صفحه جدید ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function show(Template $template)
    {
        $breadcrumbs = [
            ['link' => 'javascript:void(0)', 'name' => "صفحه ساز"],
            ['link' => route('cms.templates.index'), 'name' => "لیست صفحات"],
            ['link' => 'javascript:void(0)', 'name' => "پیکربندی صفحه"],
            ['name' => $template->name]
        ];
        return view('content.entity.template.config', compact('breadcrumbs', 'template'));
    }

    public function edit(Template $template)
    {
        $breadcrumbs = [
            ['link' => 'javascript:void(0)', 'name' => "صفحه ساز"],
            ['link' => route('cms.templates.index'), 'name' => "لیست صفحات"],
            ['link' => 'javascript:void(0)', 'name' => "ویرایش صفحه"],
            ['name' => $template->name]
        ];
        return view('content.entity.template.edit', compact('breadcrumbs', 'template'));
    }

    public function update(Request $request, Template $template)
    {
        try {
            $locales = $request->only(config('translatable.locales'));
            $attrs = array_merge($request->only(['name', 'slug', 'active']), $locales);
            abort_if($template->slug == 'home' && !$request->has('config_template'), 403);
            if ($request->has('config_template')) {
                $attrs = $this->renderConfigAttrs($request);
            }
            $template->update($attrs);
            \App\Helpers\Helper::deleteNoExistsLangs($template);
            alert()
                ->success("اطلاعات صفحه مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.templates.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اطلاعات صفحه مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    /**
     * @param Request $request
     */
    private function renderConfigAttrs($request, $attrs = [])
    {
        foreach ($request->only(config('translatable.locales')) as $index => $locale) {
            if ($request->has("{$index}.content")) {
                $content = json_decode($request->get($index)['content'], true);
                safeUrls($content);
                $attrs[$index]['content'] = $content;
            } else {
                unset($attrs[$index]);
            }
            if (!isset($request->get('has_lang')[$index]))
                unset($attrs[$index]);
        }
        return $attrs;
    }

    public function setUsers(Template $template)
    {
        $breadcrumbs = [
            ['link' => 'javascript:void(0)', 'name' => "صفحه ساز"],
            ['link' => route('cms.templates.index'), 'name' => "لیست صفحات"],
            ['link' => 'javascript:void(0)', 'name' => "کاربران / حق دسترسی"],
            ['name' => $template->name]
        ];
//        dd(json_encode($template->users ?? []));
        return view('content.entity.template.users', compact('breadcrumbs', 'template'));
    }

    public function updateUsers(Request $request, Template $template)
    {
        try {
            $template->update([
                'users' => json_decode($request->get('users_data'), true)
            ]);
            alert()
                ->success("لیست کاربران صفحه مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.templates.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("لیست کاربران صفحه مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function uploader()
    {
        $uploadedFile = request()->file('file');
        $name = time() . "__" . $uploadedFile->getClientOriginalName();
        $url = $uploadedFile->storeAs('photos/shares/pb_uploads/', $name, 'lfm');
        return ['location' => Storage::disk('lfm')->url($url)];
    }

    public function destroy(Template $template)
    {
        try {
            abort_if($template->slug == 'home', 403);
            $template->delete();
            alert()
                ->success("صفحه مورد نظر حذف شد.");
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("صفحه مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }
}
