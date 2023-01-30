<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách danh mục';

        $category = Category::paginate(10);

        return view('Admin.Category.Category', compact('title', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới danh mục';

        return view('Admin.Category.Create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->validate([
            'name' => 'unique:categories,name',
            'img' => 'required'
        ], [
            'name.unique' => 'Tên đã tồn tại trong danh mục',
            'img.required' => 'Ảnh danh mục không được phép trống',
        ]);


        if ($request->has('img')){
            $file = $request->img;
            $file_name = $file->GetClientOriginalName();
            $file->move(public_path('assets\layout\img\category'), $file_name);
        }

        $request->merge(['image' => $file_name]);

        $category = new Category();

        $category->name = $request->input('name');
        $category->slug = str::slug($request->input('name'), '-');
        $category->image = $request->input('image');
        $category->description = $request->input('description');
        $category->active = $request->input('active');

        $category->save();

        return redirect()->route('category.category')->with('msg', 'Thêm danh mục thành công');
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
        $title = 'Cập nhật danh mục';

        $category = Category::where('id', $id)->first();

        return view('Admin.Category.Edit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $request->validate([
            'name' => 'unique:categories,name,'.$id.',id'
        ], [
            'name.unique' => 'Tên đã tồn tại trong danh mục'
        ]);

        $category = Category::find($id);

        if(!empty($request->img))
        {
            if ($request->has('img')){
                $file = $request->img;
                $file_name = $file->GetClientOriginalName();
                $file->move(public_path('assets\layout\img\category'), $file_name);
            }
    
            $request->merge(['image' => $file_name]);
    
            $category->name = $request->input('name');
            $category->slug = str::slug($request->input('name'), '-');
            $category->image = $request->input('image');
            $category->description = $request->input('description');
            $category->active = $request->input('active');
    
            $category->save();
        }
        else
        {
            $category->name = $request->input('name');
            $category->slug = str::slug($request->input('name'), '-');
            $category->description = $request->input('description');
            $category->active = $request->input('active');
    
            $category->save();
        }

        return redirect()->back()->with('msg', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('msg', 'Xoá danh mục thành công!');
    }
}
