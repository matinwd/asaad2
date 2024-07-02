<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\CreateContactRequest;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function storeRequest(CreateContactRequest $request)
    {
        try{
            $request->validate([
                'email' => 'required',
                'name' => 'required',
                'subject' => 'required',
                'message' => 'required'
            ]);

            ContactRequest::create($request->all());

            $data = [
                'type' => 'success',
                'message' => trans('contact_modal.success_msg'),
            ];
            alert()->basic(trans('actions.contact_request_success'),trans('actions.contact_request_success_header'));


            return back();
        }catch (\Exception $exception){
            dd($exception);
        }
    }
}
