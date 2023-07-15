<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm() {
        return view('clients.pages.auth.login');
    }
    public function login(Request $request) {
        $infoLogin = $request->only('email','password');
        if(Auth::attempt($infoLogin)) {
            toastr()->success('Đăng nhập thành công');
            return redirect()->route('home-client');
        }
        toastr()->error('Đăng nhập thất bại');
        return back();
    }
    public function registerForm() {
        return view('clients.pages.auth.register');
    }
    public function register(Request $request) {
        $infoRegister = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->save();
        if($infoRegister){
            toastr()->success('Đăng ký thành công');
            return redirect()->route('auth.loginForm');
        }
        toastr()->error('Đăng ký không thành công');
        return back();
    }
    public function logout() {
        Auth::logout();
        toastr()->info('Logout Successfully');
        return redirect()->route('auth.loginForm');
    }
}
