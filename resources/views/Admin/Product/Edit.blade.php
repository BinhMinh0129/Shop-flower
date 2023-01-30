@extends('Layouts.Admin')

@section('head_js')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <h2 class="text-center">{{$title}}</h2>
        @if(session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
        @endif

        <form action="" method="post" enctype="multipart/form-data">
            @csrf()
            <div class="mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="{{old('name') ?? $product->name}}">
                @error('name')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Danh mục</label>
                <select class="form-select" aria-label="Default select example" name="category_id" >
                    @if(!empty($category))
                    {
                        @foreach($category as $k=>$item)
                        {
                            <option value="{{$item->id}}"
                            @if($product->category_id == $item->id ?? old('category_id') == $item->id)
                                selected
                            @endif
                            >{{$item->name}}</option>
                        }
                        @endforeach
                    }
                    @else
                    {
                        <option>Không có danh mục nào</option>
                    }
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh sản phẩm</label>
                <div class="mb-3">
                    <img src="{{asset('assets/layout/img/product/'.$product->image)}}" alt="Hình ảnh sản phẩm" style="width: 150px; height: 150px;">
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh sản phẩm mới</label>
                <input type="file" class="form-control" name="img" placeholder="Nhập tên danh mục" value="{{old('img')}}">
                @error('img')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Mô tả</label>
                <textarea name="description" id="" class="form-control" style="height: 150px;">{{old('description') ?? $product->description}}</textarea>
                @error('description')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Mô tả chi tiết</label>
                <textarea name="content" id="" class="form-control" style="height: 150px;">{{old('content') ?? $product->content}}</textarea>
                @error('content')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm" value="{{old('price') ?? $product->price}}">
                @error('price')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Giá bán sản phẩm</label>
                <input type="text" class="form-control" name="price_sale" placeholder="Nhập giá giảm sản phẩm" value="{{old('price_sale') ?? $product->price_sale}}">
                @error('price_sale')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="flexRadioDefault1" value="1"
                    @if($product->active == 1)
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Có
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="flexRadioDefault2" value="0"
                    @if($product->active == 0)
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Không
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{route('product.product')}}" class="btn btn-warning">Quay lại</a>
        </form>
    </div>
</div>
@endsection

@section('footer_js')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection