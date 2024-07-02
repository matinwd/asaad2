<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotifyRequest;
use App\Jobs\SendSMSJob;
use App\Mail\GeneralMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotifyController extends Controller
{
    public function index()
    {
        return view('content.entity.send-notify');
    }

    public function store(NotifyRequest $request)
    {
        try {
            if($request->type == 'sms')
                dispatch(new SendSMSJob($request->user_key,$request->pattern,[]));
            else
                Mail::to($request->user_key)->send(new GeneralMail($request->all()));

            if($request->wantsJson()){
                return response()->json();
            }

            alert()
                ->success("ایمیل به کاربر مورد نظر ارسال شد");

            return back();
        }
        catch (\Exception $exception){
            report($exception);
            dd($exception);
        }
    }
}
