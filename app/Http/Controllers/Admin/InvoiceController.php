<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class InvoiceController extends Controller
{
    public function index()
    {
        $title = 'Hoá đơn';

        $cart = Cart::all();

        return view('Admin.Invoice.Invoice', compact('title', 'cart'));
    }

    public function show($id)
    {
        $title = 'Chi tiết hoá đơn';

        $cart = Cart::where('id', $id)
        ->first();

        return view('Admin.Invoice.InvoiceDetail', compact('title', 'cart'));
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->active = $request->input('active');
        $cart->save();

        return redirect()->back()->with('msg', 'Cập nhật đơn hàng thành công.');
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('msg', 'Xoá hoá đơn thành công!');
    }
}
