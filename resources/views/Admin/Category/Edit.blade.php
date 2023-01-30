@extends('Layouts.Admin')

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
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{old('name') ?? $category->name}}">
                @error('name')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh cũ</label>
                <div class="mb3">
                    <img src="{{asset('assets/layout/img/category/'.$category->image)}}" alt="Hình ảnh danh mục" style="width: 150px; height: 150px;">
                </div>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh cập nhật</label>
                <input type="file" class="form-control" name="img" placeholder="Nhập tên danh mục" value="{{old('img')}}">
                @error('img')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Mô tả</label>
                <textarea name="description" id="" class="form-control" style="height: 150px;">{{old('description') ?? $category->description}}</textarea>
                @error('description')
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="flexRadioDefault1" value="1" 
                    @if($category->active == 1)
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Có
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="flexRadioDefault2" value="0"
                    @if($category->active == 0)
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Không
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{route('category.category')}}" class="btn btn-warning">Quay lại</a>
        </form>
    </div>
</div>
@endsection