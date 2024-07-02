<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "فعالیت ها"],
            ['name' => "فهرست"]
        ];

        $items = Activity::orderBy('created_at','desc')->paginate();

        return view('content.entity.activity.list',compact('items'));
    }
}
