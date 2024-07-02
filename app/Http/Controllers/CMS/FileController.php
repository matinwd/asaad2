<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\FileUploaderTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    use FileUploaderTrait;

    public function __invoke(Request $request)
    {
        $localPath = $this->putFile($request->file('file'));
        return response()->json(['location' => url(Storage::url($localPath))]);
    }
}
