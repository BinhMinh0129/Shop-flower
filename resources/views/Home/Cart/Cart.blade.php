@extends('Layouts.Home')

@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::has("Cart") != null)
                                @foreach(Session::get('Cart')->products as $item)
                                    <tr>
                                        <td class="d-flex" style="justify-content: space-between; align-items: center;">
                                            <div class="cart-x">
                                                <a href="javascrip:" class="x-close" data-id="{{$item['productInfo']->id}}">
                                                    <i class="fa-regular fa-rectangle-xmark" style="font-size: 20px;"></i>
                                                </a>
                                            </div>

                                            <div class="cart_product_img">
                                                <img src="{{asset('assets/layout/img/product/'.$item['productInfo']->image)}}" alt="Product">
                                            </div>
                                        </td>
                                        <td class="cart_product_desc">
                                            <span>{{$item['productInfo']->name}}</span>
                                        </td>
                                        <td class="price">
                                            <span style="font-size: 14px;">{{number_format($item['productInfo']->price_sale)}} VND</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex" style="justify-content: space-between;">
                                                <div class="quantity">
                                                    @if($item['amount'] > 1)
                                                        <span class="qty-minus" data-id="{{$item['productInfo']->id}}" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    @else
                                                        <span hidden class="qty-minus" data-id="{{$item['productInfo']->id}}" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    @endif

                                                    <input type="text" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{$item['amount']}}">
                                                    
                                                    @if($item['amount'] < 10)
                                                        <span class="qty-plus" data-id="{{$item['productInfo']->id}}" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    @else 
                                                        <span hidden class="qty-plus" data-id="{{$item['productInfo']->id}}" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">
                                            <span style="font-size: 14px;">{{number_format($item['productInfo']->price_sale * $item['amount'])}} VND</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="4">Không có sản phẩm nào trong giỏ hàng</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
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
                    <div class="cart-btn mt-100">
                        <a href="{{route('home.checkout.checkout')}}" class="btn amado-btn w-100">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection