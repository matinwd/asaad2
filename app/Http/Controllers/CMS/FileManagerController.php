<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public function photo()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "مدیریت فایل"],
            ['name' => "تصاویر"]
        ];
        $type = 'Images';
        $title = 'لیست تصاویر';
        return view('content.lfm',compact('breadcrumbs','type','title'));
    }

    public function doc()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "مدیریت فایل"],
            ['name' => "اسناد"]
        ];
        $type = 'Files';
        $title = 'لیست اسناد';
        return view('content.lfm',compact('breadcrumbs','type','title'));
    }
}
