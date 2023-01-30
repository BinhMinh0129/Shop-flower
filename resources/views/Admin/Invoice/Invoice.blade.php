@extends('Layouts.Admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <h2 class="text-center">{{$title}}</h2>
        @if(session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" class="text-center">Xem</th>
                    <th scope="col" class="text-center">Xoá</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($cart))
                    @foreach($cart as $k=>$item)
                    <tr>
                        <td class="text-center">{{$item->customer_name}}</td>
                        <td class="text-center">{{$item->address}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">{{$item->phone_number}}</td>
                        <td>
                            @if($item->active == 0)
                                Chưa thanh toán
                            @elseif($item->active == 1)
                                Đã thanh toán
                            @elseif($item->active == 2)
                                Hoàn thành
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('invoice.show', ['id'=>$item->id])}}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('invoice.destroy', ['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa-solid fa-trash"></i></a>
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