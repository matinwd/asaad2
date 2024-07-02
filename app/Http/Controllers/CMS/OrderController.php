<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Class OrderController.
 *
 * @package namespace App\Http\Controllers;
 */
class OrderController extends Controller
{

    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "محصولات"],
            ['name' => "فهرست"]
        ];
        $items = Order::orderBy('created_at','desc')->paginate();
        return view('content.entity.order.list', compact('breadcrumbs', 'items'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('content.entity.order.show', compact('order'));
    }

       public function destroy($id)
    {
        $deleted = Order::destroy($id);
        alert()
            ->success("سفارش با موفقیت حذف شد");
        return redirect()->route('cms.orders.index');
    }

    public function changeStatus($id,Request $request)
    {
        $order = Order::find($id);

        $order->status = request()->status;

        $order->save();

        alert()
            ->success("وضعیت سفارش با موفقیت ویرایش شد");

        return redirect()->route('cms.orders.index');


    }
}
