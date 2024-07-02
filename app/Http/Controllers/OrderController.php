<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Mail\GeneralMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        try{
            $order = Order::create($request->validated());
            alert()->basic(trans('order_modal.success_msg'),trans('order_modal.success_msg_title'));

//            Mail::to($request->user_key)->send(new GeneralMail(['title' => 'Your order successfully created']));

            return back();
        }catch(\Exception $exception){
            report($exception);
            dd($exception);
            return back()->withError(trans('order_modal.fail_msg'));

        }
    }
}
