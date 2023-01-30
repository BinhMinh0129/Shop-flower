@extends('Layouts.Admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    @if(session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h1>{{$title}}</h1>

    <div class="bg-light rounded-top p-4">
        <div class="" style="margin-bottom: 30px;">
            <h3>
                Trạng thái hoá đơn: 
                
                @if($cart->active == 0)
                    Chưa thanh toán
                @elseif($cart->active == 1)
                    Đã thanh toán
                @elseif($cart->active == 2)
                    Hoàn thành
                @endif
            </h3>

            <h5>Cập nhật trạng thái</h5>

            <form action="" method="post">
                @csrf
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="0"
                    @if($cart->active == 0)
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="exampleRadios1">
                        Chưa thanh toán
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="1"
                    @if($cart->active == 1)
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="exampleRadios2">
                        Đã thanh toán
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="2"
                    @if($cart->active == 2)
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="exampleRadios2">
                        Hoàn thành
                    </label>
                </div>

                <button type="submit" class="btn btn-success" style="margin-top: 10px;">Cập nhật</button>
            </form>
            
        </div>

        <h3>Thông tin người mua hàng</h3>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Họ và tên khách hàng:</th>
                    <th scope="col">{{$cart->customer_name}}</th>
                </tr>

                <tr>
                    <th scope="col">Địa chỉ:</th>
                    <th scope="col">{{$cart->address}}</th>
                </tr>

                <tr>
                    <th scope="col">Email:</th>
                    <th scope="col">{{$cart->email}}</th>
                </tr>

                <tr>
                    <th scope="col">Số điện thoại:</th>
                    <th scope="col">{{$cart->phone_number}}</th>
                </tr>
            </thead>
        </table>

        <br>
        <h3>Thông tin hoá đơn</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->cartdetail as $item)
                <tr>
                    <td>{{$item->product->name}}</td>
                    <td>
                        <img src="{{asset('assets/layout/img/product/' . $item->product->image)}}" alt="Ảnh sản phẩm" style="width: 150px;">
                    </td>
                    <td>{{number_format($item->product->price_sale)}}VND</td>
                    <td>{{$item->amount}}</td>
                    <td>{{number_format($item->product->price_sale * $item->amount)}}VND</td>
                </tr>
                @endforeach
                <tr>
                    <td style="text-align: center; font-size: 25px;">Tổng tiền:</td>
                    <td colspan="4" style="text-align: center; font-size: 25px;">{{number_format($cart->total_price)}}VND</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection