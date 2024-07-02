<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentCreateRequest $request)
    {
        try {
            $attrs = array_filter($request->validated(),function($item){
                return $item != '';
            });
            $comment = Comment::create($attrs);
            alert()->basic(trans('blog_side_bar.leave_comment_success'),trans('blog_side_bar.leave_comment_success_header'));
            return back();
        }
        catch(\Exception $exception){
            dd($exception);
            report($exception);
        }
    }
}
