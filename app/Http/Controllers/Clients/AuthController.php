<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Clients\Auth\AuthRequest;
use Brian2694\Toastr\Facades\Toastr as FacadesToastr;
use Brian2694\Toastr\Toastr;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('clients.pages.auth.login');
    }
    public function login(Request $request)
    {
        $infoLogin = $request->only('email', 'password');
        if (Auth::attempt($infoLogin)) {
            if($this) {

            }
            toastr()->success('Đăng nhập thành công', 'Thành công');
            // Toastr::success('Đăng nhập thành công', 'Thành công');
            return redirect()->route('home-client');
        }
        toastr()->error('Đăng nhập thất bại', 'Lỗi');
        return back();
    }
    public function registerForm()
    {
        return view('clients.pages.auth.register');
    }
    public function register(AuthRequest $request)
    {
        $infoRegister = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->save();
        if ($infoRegister) {
            toastr()->success('Đăng ký thành công', 'Thành công');
            return redirect()->route('auth.loginForm');
        }
        toastr()->error('Đăng ký không thành công', 'Lỗi');
        return back();
    }
    public function logout()
    {
        Auth::logout();
        toastr()->info('Logout Successfully', 'Thành công');
        return redirect()->route('auth.loginForm');
    }
}
