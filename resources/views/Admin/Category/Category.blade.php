@extends('Layouts.Admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <h2 class="text-center">{{$title}}</h2>
        @if(session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        <table class="table table-bordered">
            <div class="mb-3" style="float: right;">
                <a href="{{route('category.create')}}" class="btn btn-secondary">Thêm mới</a>
            </div>
            <thead>
                <tr>
                <th scope="col" class="text-center">Tên danh mục</th>
                <th scope="col" class="text-center">Ảnh danh mục</th>
                <th scope="col" class="text-center">Mô tả</th>
                <th scope="col" class="text-center">Trạng thái</th>
                <th scope="col" class="text-center">Sửa</th>
                <th scope="col" class="text-center">Xoá</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($category))
                    @foreach($category as $k=>$item)
                    <tr>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">
                            <img src="{{asset('assets/layout/img/category/'.$item->image)}}" alt="" style="width: 150px; height: 150px;">
                        </td>
                        <td>{{$item->description}}</td>
                        <td>
                            @if($item->active == 1)
                                Hoạt động
                            @else
                                Không hoạt động
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('category.edit', ['id'=>$item->id])}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('category.destroy', ['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="6">Danh sách danh mục trống</td>
                </tr>
                @endif
            </tbody>
        </table>
        @if(!empty($category))
            {{$category->links('Admin.Blocks.Paginate')}}
        @endif
    </div>
</div>
@endsection