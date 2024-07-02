<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::active()
            ->translatedIn(app()->getLocale())
            ->get();
        return view('front.gallery',compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        abort_unless($gallery->hasTranslation(app()->getLocale()),404);
        return view('front.album',compact('gallery'));
    }
}
