<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Trang chủ';

        $products = Product::where('active', 1)
        ->orderBy('updated_at', 'desc')
        ->limit(9)
        ->get();

        return view('Home.Home.Home', compact('title', 'products'));
    }

    public function category()
    {
        $title = 'Danh mục sản phẩm';

        $products = Product::where('active', 1)
        ->orderBy('updated_at', 'desc')
        ->paginate(6);

        $categorys = Category::where('active', 1)
        ->get();

        return view('Home.Category.Category', compact('title', 'products', 'categorys'));
    }

    public function categorySlug($slug)
    {
        $categorySlug = Category::where('slug', $slug)
        ->first();

        $title = $categorySlug->name;

        $products =  Product::where('active', 1)
        ->where('category_id', $categorySlug->id)
        ->orderBy('updated_at', 'desc')
        ->paginate(6);

        $categorys = Category::where('active', 1)
        ->get();

        return view('Home.Category.Category', compact('title', 'products', 'categorys'));
    }

    public function product($slugCT, $slugPD)
    {
        $categorySlug = Category::where('slug', $slugCT)
        ->first();

        $productSlug = Product::where('slug', $slugPD)
        ->first();

        $title = $productSlug->name;

        return view('Home.Product.Product', compact('title', 'productSlug', 'categorySlug'));
    }
}
