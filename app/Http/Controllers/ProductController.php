<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function category(Category $category)
    {
        abort_unless($category->hasTranslation(app()->getLocale()),404);

        SEOTools::setTitle('Products | Category of '. $category->name);
        SEOTools::setDescription('Products of Ductcen');
        SEOMeta::addKeyword('Ductcen tags,Ductcen product tags');


        $categories = Category::all();
        $products = $category->products()->latest()->translatedIn(app()->getLocale())->where(Product::getClosure())->paginate(9);
        return view('pages.products', compact('products','category','categories'));
    }

    public function index()
    {

        SEOTools::setTitle('All Products');
        SEOTools::setDescription('You Can see All Products of Ductcen Here' );
        SEOMeta::addKeyword('Ductcen tags,Ductcen product tags');




        return view('pages.products', compact('products','categories'));
    }

    public function show(Product $product)
    {

        SEOTools::setTitle($product->name);
        SEOTools::setDescription($product->short_description);
        SEOMeta::addKeyword($product->tags);


        abort_unless($product->hasTranslation(app()->getLocale()),404);
        $relatedProducts = $product->category?->products;
        return view('pages.product-detail', compact('product','relatedProducts'));
    }


}
