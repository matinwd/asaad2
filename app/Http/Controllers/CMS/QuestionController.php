<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "سوالات"],
            ['name' => "فهرست"]
        ];

        $items = Question::paginate();
        return view('content.entity.question.list', compact('items','breadcrumbs'));
    }


    public function store(QuestionCreateRequest $request)
    {
        try {
            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $item = Question::create($attrs);
            alert()
                ->success("سوال شما ثبت شد.");
            return redirect()->route('cms.questions.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("سوال شما ثبت نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "سوالات"],
            ['name' => "سوال جدید"]
        ];
        return view('content.entity.question.add', compact('breadcrumbs'));
    }

    public function edit(Question $question)
    {
        $breadcrumbs = [
            ['link' => route('cms.categories.index'), 'name' => "سوالات"],
            ['link' => "javascript:void(0)", 'name' => "ویرایش سوال"],
            ['name' => $question->name]
        ];
        return view('content.entity.question.edit', compact('breadcrumbs', 'question'));
    }


    public function update(QuestionUpdateRequest $request,Question $question)
    {
        try {

            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $question = $question->update($attrs);

            \App\Helpers\Helper::deleteNoExistsLangs($question);
            alert()
                ->success("اطلاعات سوال مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.questions.index');
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("اطلاعات سوال مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = Question::destroy($id);

        alert()
            ->success("سوال با موفقیت حذف شد");
        return redirect()->route('cms.questions.index');
    }
}
