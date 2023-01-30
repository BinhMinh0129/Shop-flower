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
                <a href="{{route('product.create')}}" class="btn btn-secondary">Thêm mới</a>
            </div>
            <thead>
                <tr>
                <th scope="col" class="text-center">Tên sản phẩm</th>
                <th scope="col" class="text-center">Danh mục</th>
                <th scope="col" class="text-center">Ảnh sản phẩm</th>
                <th scope="col" class="text-center">Mô tả</th>
                <th scope="col" class="text-center">Mô tả chi tiết</th>
                <th scope="col" class="text-center">Giá</th>
                <th scope="col" class="text-center">Giá bán</th>
                <th scope="col" class="text-center">Trạng thái</th>
                <th scope="col" class="text-center">Sửa</th>
                <th scope="col" class="text-center">Xoá</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($product))
                    @foreach($product as $k=>$item)
                    <tr>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->category->name}}</td>
                        <td class="text-center">
                            <img src="{{asset('assets/layout/img/product/'.$item->image)}}" alt="" style="width: 150px; height: 150px;">
                        </td>
                        <td>
                            <div style="width: 100px; overflow: hidden; text-overflow: ellipsis; line-height: 25px; -webkit-line-clamp: 3; height: 75px; display: -webkit-box; -webkit-box-orient: vertical;">
                                {{$item->description}}
                            </div>
                        </td>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                            <div style="width: 100px; overflow: hidden; text-overflow: ellipsis; line-height: 25px; -webkit-line-clamp: 3; height: 75px; display: -webkit-box; -webkit-box-orient: vertical;">
                                {!!$item->content!!}
                            </div>
                        </td>
                        <td>{{number_format($item->price)}} VND</td>
                        <td>{{number_format($item->price_sale)}} VND</td>
                        <td>
                            @if($item->active == 1)
                                Hoạt động
                            @else
                                Không hoạt động
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('product.edit', ['id'=>$item->id])}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('product.destroy', ['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="10">Danh sách sản phẩm trống</td>
                </tr>
                @endif
            </tbody>
        </table>
        @if(!empty($product))
            {{$product->links('Admin.Blocks.Paginate')}}
        @endif
    </div>
</div>
@endsection