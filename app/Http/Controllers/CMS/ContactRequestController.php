<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تماس با ما"],
            ['name' => "لیست پیام ها"]
        ];
        $items = ContactRequest::paginate();
        return view('content.entity.request.list', compact('breadcrumbs', 'items'));
    }

    public function show(ContactRequest $contactRequest)
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "تماس با ما"],
            ['link' => "javascript:void(0)", 'name' => "لیست پیام ها"],
            ['name' => $contactRequest->name]
        ];
        return view('content.entity.request.details', compact('breadcrumbs', 'contactRequest'));
    }

    public function destroy(ContactRequest $contactRequest)
    {
        try {
            $contactRequest->delete();
            alert()
                ->success("درخواست مورد نظر حذف شد.");
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("درخواست مورد نظر حذف نشد.لطفا مجددا تلاش کنید.");
        }
        return back();
    }
}
