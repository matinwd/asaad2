<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\ContactRequest;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\Template;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $pageConfigs = ['pageHeader' => false];

        $posts = Post::latest()->with(['category'])->limit(3)->get();
        $products = Product::latest()->limit(3)->get();
        $orders = Order::latest()->limit(3)->get();

        $postsCount = Post::count();
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $templatesCount = Template::count();

        return view('content.dashboard', compact('pageConfigs', 'posts', 'products', 'orders', 'postsCount', 'productsCount', 'ordersCount', 'templatesCount'));
    }

    public function editPassword()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('content.edit_password', compact('pageConfigs'));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            $user = auth()->user();
            $newPass = $request->get('password');
            $user->password = bcrypt($newPass);
            $user->saveOrFail();

            \Auth::logoutOtherDevices($newPass);
            alert()
                ->success("کلمه عبور با موفقیت بروزرسانی شد");
            \Auth::logoutCurrentDevice();
            return redirect()->route('login');
        } catch (\Exception $exception) {
            report($exception);
            alert()->error("خطا در ویرایش رمز - لطفا مجدد تلاش کنید");
        }
        return back();
    }

    public function editProfile()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('content.edit_profile', compact('pageConfigs'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            auth()->user()->update($request->validated());
            alert()
                ->success("اطلاعات شما با موفقیت بروزرسانی شد");
            return redirect()->route('cms.dashboard');
        } catch (\Exception $exception) {
            alert()
                ->error("اطلاعات شما بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }
}
