<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách sản phẩm';

        $product = Product::orderBy('category_id')->paginate(10);

        return view('Admin.Product.Product', compact('title', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Danh sách sản phẩm';

        $category = Category::all();

        return view('Admin.Product.Create', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validate([
            'name' => 'unique:products,name',
            'img' => 'required'
        ], [
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'img.required' => 'Ảnh sản phẩm không được phép trống'
        ]);

        if ($request->has('img')){
            $file = $request->img;
            $file_name = $file->GetClientOriginalName();
            $file->move(public_path('assets\layout\img\product'), $file_name);
        }
        $request->merge(['image' => $file_name]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = str::slug($request->input('name'), '-');
        $product->category_id = $request->input('category_id');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('price_sale');
        $product->active = $request->input('active');
        $product->save();

        return redirect()->route('product.product')->with('msg', 'Thêm sản phẩm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Cập nhật sản phẩm';

        $product = Product::where('id', $id)->first();

        $category = Category::all();

        return view('Admin.Product.Edit', compact('title', 'product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $request->validate([
            'name' => 'unique:products,name,'.$id.',id',
        ],[
            'name.unique' => 'Tên sản phẩm đã tồn tại',
        ]);

        $product = Product::find($id);

        if(!empty($request->img))
        {
            if ($request->has('img')){
                $file = $request->img;
                $file_name = $file->GetClientOriginalName();
                $file->move(public_path('assets\layout\img\product'), $file_name);
            }
            $request->merge(['image' => $file_name]);
    
            $product->name = $request->input('name');
            $product->slug = str::slug($request->input('name'), '-');
            $product->category_id = $request->input('category_id');
            $product->image = $request->input('image');
            $product->description = $request->input('description');
            $product->content = $request->input('content');
            $product->price = $request->input('price');
            $product->price_sale = $request->input('price_sale');
            $product->active = $request->input('active');
            $product->save();
        }
        else
        {
            $product->name = $request->input('name');
            $product->slug = str::slug($request->input('name'), '-');
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');
            $product->content = $request->input('content');
            $product->price = $request->input('price');
            $product->price_sale = $request->input('price_sale');
            $product->active = $request->input('active');
            $product->save();
        }

        return redirect()->back()->with('msg', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('msg', 'Xoá sản phẩm thành công');
    }
}
