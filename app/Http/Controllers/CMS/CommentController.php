<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Traits\FileUploaderTrait;
use App\Traits\VisibilityChangerTrait;
use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\CommentUpdateRequest;

class CommentController extends Controller
{
    use FileUploaderTrait,VisibilityChangerTrait;

    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "نظرات"],
            ['name' => "فهرست"]
        ];
        $items = Comment::withoutGlobalScope('visible')->paginate();
        return view('content.entity.comment.list', compact('breadcrumbs', 'items'));
    }

    public function store(CommentCreateRequest $request)
    {
        try {

            $attrs = $request->validated();
            $comment = Comment::create($attrs);
            alert()
                ->success("کامنت شما ثبت شد.");
            return redirect()->route('cms.comments.index');


    } catch (\Exception $exception) {

            dd($exception);
        report($exception);

        alert()
            ->error("اطلاعات کامنت مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
        return back()->withInput();
    }
    }

    public function edit( $id)
    {
        $comment = Comment::withoutGlobalScope('visible')->where('id',$id)->first();
        $breadcrumbs = [
            ['link' => route('cms.categories.index'), 'name' => "کامنتات"],
            ['link' => "javascript:void(0)", 'name' => "ویرایش کامنت"],
            ['name' => $comment->name]
        ];
        return view('content.entity.comment.edit', compact('breadcrumbs', 'comment'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "نظرات/نظر جدید"],
            ['name' => "نظر جدید"]
        ];
        return view('content.entity.comment.add', compact('breadcrumbs'));
    }

    public function update(CommentUpdateRequest $request, $id)
    {
        $comment = Comment::withoutGlobalScope('visible')->where('id',$id)->first();
        try {
            $attrs = array_filter($request->validated(),function($item){
                return $item != '';
            });


            $comment->update($attrs);

            alert()
                ->success("اطلاعات کامنت مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.comments.index');
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("اطلاعات کامنت مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = Comment::destroy($id);

        alert()
            ->success("کامنت با موفقیت حذف شد");
        return redirect()->route('cms.comments.index');
    }

}
