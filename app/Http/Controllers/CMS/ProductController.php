<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\FileUploaderTrait;
use App\Traits\VisibilityChangerTrait;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{
    use FileUploaderTrait,VisibilityChangerTrait;

    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "محصولات"],
            ['name' => "فهرست"]
        ];
        $items = Product::paginate();
        return view('content.entity.product.list', compact('breadcrumbs', 'items'));
    }


    public function store(ProductCreateRequest $request)
    {
        try {
            $attrs = array_filter($request->validated(),function($item){
                return $item != '';
            });

            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $product = Product::create($attrs);
            alert()
                ->success("محصول شما ثبت شد.");
            return redirect()->route('cms.products.index');


        } catch (\Exception $exception) {

            report($exception);
            alert()
                ->error("اطلاعات محصول مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('content.entity.product.add',compact('categories'));
    }

    public function edit(Product $product)
    {

        $breadcrumbs = [
            ['link' => route('cms.categories.index'), 'name' => "محصولات"],
            ['link' => "javascript:void(0)", 'name' => "ویرایش محصول"],
            ['name' => $product->name]
        ];
        $categories =  Category::all();
        return view('content.entity.product.edit', compact('breadcrumbs', 'product','categories'));
    }


    public function update(ProductCreateRequest $request,Product $product)
    {
        try {
            $attrs = array_filter($request->validated(),function($item){
                return $item != '';
            });

            foreach ($request->get('has_lang') as $index => $item) {
                $attrs[$index] = $request->get($index);
            }
            $product = $product->update($attrs);

            \App\Helpers\Helper::deleteNoExistsLangs($product);
            alert()
                ->success("اطلاعات محصول مورد نظر بروزرسانی شد.");
            return redirect()->route('cms.products.index');
        }catch (\Exception $exception){
            report($exception);
            alert()
                ->error("اطلاعات محصول مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }


    public function destroy($id)
    {
        $deleted = Product::destroy($id);

        alert()
            ->success("محصول با موفقیت حذف شد");
        return redirect()->route('cms.products.index');
    }

}
