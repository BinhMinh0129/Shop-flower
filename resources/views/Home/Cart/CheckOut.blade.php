@extends('Layouts.Home')

@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <form action="" method="post">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Thanh toán</h2>
                            @if(session('msg'))
                            <div class="alert alert-success">{{session('msg')}}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
                            @endif
                        </div>

                        <div class="row">
                            @csrf
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Họ và tên" value="{{old('customer_name')}}" name="customer_name">
                                @error('customer_name')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Địa chỉ" value="{{old('address')}}" name="address">
                                @error('address')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Số điện thoại" value="{{old('phone_number')}}" name="phone_number">
                                @error('phone_number')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <input type="email" class="form-control" placeholder="Email" value="{{old('email')}}" name="email">
                                @error('email')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Tổng giỏ hàng</h5>
                        <ul class="summary-table">
                            <li><span>Phí ship:</span> <span>Free</span></li>
                            <li>
                                <span>Tổng:</span> 
                                <span>
                                    @if(Session::has("Cart") != null)
                                        {{number_format(Session::get('Cart')->totalPrice)}}VND
                                    @else
                                        0
                                    @endif
                                </span>
                            </li>
                        </ul>

                        <div class="payment-method">
                            <!-- Cash on delivery -->
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="cod" checked>
                                <label class="custom-control-label" for="cod">Thanh toán sau khi nhận hàng</label>
                            </div>
                        </div>

                        <div class="cart-btn mt-30">
                            <button type="submit" href="#" class="btn amado-btn w-100">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection