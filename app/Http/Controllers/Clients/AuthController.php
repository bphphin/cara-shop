<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Clients\Auth\AuthRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class AuthController extends Controller
{

    public function login(AuthRequest $request)
    {
        if ($request->getMethod() === 'POST') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                if (Auth::user()->role === 1) {
                    toast('Đăng nhập thành công!', 'success');
                    return redirect()->route('admin');
                }
                toast('Đăng nhập thành công!', 'success');
                return redirect()->route('home-client');
            }
            toast('Đăng nhập không thành công', 'info');
            return back();
        }
        return view('clients.pages.auth.login');
    }

    public function register(AuthRequest $request)
    {
        if ($request->getMethod() === 'POST') {
            $credentials = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if ($credentials) {
                $emailRegister = $request->email;
                Mail::to($emailRegister)->send(new NotifyMail());
                toast('Đăng ký tài khoản thành công', 'success');
                return redirect()->route('auth.loginForm');
            }
            toast('Đăng ký không thành công, vui lòng thử lại', 'warning');
            return back();
        }
        return view('clients.pages.auth.register');
    }

    public function logout()
    {
        Auth::logout();
        toast('Logout successfully', 'success');
        return redirect()->route('account.login');
    }
}
