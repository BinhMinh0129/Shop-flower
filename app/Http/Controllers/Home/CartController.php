<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Cart\Cart;

class CartController extends Controller
{
    public function cart()
    {
        $title = 'Giỏ hàng';

        return view('Home.Cart.Cart', compact('title'));
    }

    public function create(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        if(!empty($product))
        {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);

            $request->session()->put('Cart', $newCart);
        }
    }

    public function destroy(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        
        if(count($newCart->products) > 0)
        {
            $request->session()->put('Cart', $newCart);
        }
        else
        {
            $request->session()->forget('Cart');
        }
    }

    public function reduced(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);

        if(count($newCart->products) > 0)
        {
            $newCart->reducedAmount($product, $id);
            $request->session()->put('Cart', $newCart);
        }
        else
        {
            $newCart->deleteItemCart($id);
            $request->session()->forget('Cart');
        }
    }
}
