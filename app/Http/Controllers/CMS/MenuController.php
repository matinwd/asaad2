<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MenuController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "منو ساز"],
            ['name' => "فهرست"]
        ];
        $items = Menu::paginate();
        return view('content.entity.menu.list', compact('breadcrumbs', 'items'));
    }

    public function edit(Menu $menu)
    {
        $breadcrumbs = [
            ['link' => route('cms.menus.index'), 'name' => "منو ساز"],
            ['link' => "javascript:void(0)", 'name' => "ویرایش منو"],
            ['name' => $menu->name]
        ];
        return view('content.entity.menu.edit', compact('breadcrumbs', 'menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        try {
            $attrs = $request->only(config('translatable.locales'));
            foreach ($attrs as $index => $item) {
                $items = json_decode($item['items'] ?? [], true);
                safeUrls($items);
                $attrs[$index]['items'] = $items;
            }
            $menu->update($attrs);
            alert()
                ->success("آیتم های منو مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.menus.index');
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("آیتم های منو مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }
}
