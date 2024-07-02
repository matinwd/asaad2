<?php

namespace App\Http\Controllers\CMS;

use App\Exports\FormAnswersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormStoreRequest;
use App\Models\Form;
use App\Models\FormAnswer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            return cache()->rememberForever('forms-list', function () {
                return Form::all(['id', 'name']);
            });
        }

        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "فرم ساز"],
            ['name' => "فهرست"]
        ];
        $items = Form::paginate();

        return view('content.entity.form.list', compact('breadcrumbs', 'items'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => route('cms.forms.index'), 'name' => "فرم ساز"],
            ['name' => "فرم جدید"]
        ];
        return view('content.entity.form.add', compact('breadcrumbs'));
    }

    public function store(FormStoreRequest $request)
    {
        try {
            $attrs = $request->only(['name', 'slug', 'content']);
            $attrs['content'] = json_decode($attrs['content'], true);
            $form = Form::create($attrs);
            alert()
                ->success("فرم جدید ثبت شد.");
            cache()->forget('forms-list');
            return redirect()->route('cms.forms.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("فرم جدید ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function edit(Form $form)
    {
        $breadcrumbs = [
            ['link' => 'javascript:void(0)', 'name' => "فرم ساز"],
            ['link' => route('cms.forms.index'), 'name' => "لیست فرم ها"],
            ['link' => 'javascript:void(0)', 'name' => "ویرایش فرم"],
            ['name' => $form->name]
        ];
        return view('content.entity.form.edit', compact('breadcrumbs', 'form'));
    }

    public function update(FormStoreRequest $request, Form $form)
    {
        try {
            $attrs = $request->only(['name', 'slug', 'content']);
            $attrs['content'] = json_decode($attrs['content'], true);
            $form->update($attrs);
            alert()
                ->success("اطلاعات فرم مورد نظر بروزرسانی شد.");
            cache()->forget('forms-list');
            return redirect()->route('cms.forms.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اطلاعات فرم مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy(Form $form)
    {
        try {
            $form->delete();
            alert()
                ->success("فرم مورد نظر حذف شد.");
            cache()->forget('forms-list');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("فرم مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }
    public function deleteAnswer($id)
    {
        try {
            $formAnswer = FormAnswer::query()->findOrFail($id);
            $formAnswer->delete();
            alert()
                ->success("آیتم مورد نظر حذف شد.");
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("آیتم مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back()->withInput();
    }

    public function exportExcel(Form $form)
    {
        try {
            ob_end_clean();
            ob_start();
            return Excel::download(new FormAnswersExport($form), 'FormAnswersList.xlsx');
        } catch (\Exception $exception) {
            report($exception);
            return abort(505, 'خطا در پردازش داده - لطفا مجددا تلاش کنید');
        }
    }

    public function answers(Form $form)
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "فرم ساز"],
            ['link' => route('cms.forms.index'), 'name' => "لیست فرم ها"],
            ['link' => 'javascript:void(0)', 'name' => "پاسخ های ارسالی"],
            ['name' => $form->name]
        ];
        $inputs = collect($form->content_two)->pluck('label', 'name')->filter(function ($item) {
            return !is_null($item);
        });
        $items = $form->answers()->paginate();
        return view('content.entity.form.answers', compact('breadcrumbs', 'form','inputs','items'));

    }
}
