<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $title = "Thanh toán";

        return view('Home.Cart.CheckOut', compact('title'));
    }

    public function placeOder(CheckOutRequest $request)
    {
        
        $cart = new Cart();
        $cart->customer_name = $request->input('customer_name');
        $cart->address = $request->input('address');
        $cart->email = $request->input('email');
        $cart->phone_number = $request->input('phone_number');
        $cart->total_price = Session::get('Cart')->totalPrice;
        $cart->active = 0;
        $cart->save();

        $carts = Cart::latest('id')->first();

        foreach(Session::get('Cart')->products as $item)
        {
            $cartDetail = new CartDetail();
            $cartDetail->cart_id = $carts->id;
            $cartDetail->product_id = $item['productInfo']->id;
            $cartDetail->amount = $item['amount'];
            $cartDetail->price = $item['productInfo']->price_sale;
            $cartDetail->save();
        }
        Session::flush('Cart');

        return redirect()->back()->with('msg', 'Đặt hàng thành công. Cám ơn bạn đã mua hàng chúng tôi sẽ liên lạc với bạn sớm nhất có thể!');
    }
}
