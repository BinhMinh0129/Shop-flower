<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginAdmin()
    {
        $title = 'Đăng nhập Admin';

        return view('Admin.Login.Login', compact('title'));
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1,
            'active' => 1
        ];

        if(Auth::attempt($credentials))
        {
            return redirect()->route('admin');
        }
        else
        {
            return redirect()->back()->with('msg', 'Đăng nhập thất bại');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
