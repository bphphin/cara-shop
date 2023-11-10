<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="{{ asset('assets/imgs/clothes-hanger.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('assets/css/clients/home-client.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/clients/login.css') }}">
    <style>
        body{
            background-color: #a1a1a17c;
        }
    </style>
</head>
<body>
    <div class="model">
        <div class="model_heading d-flex align-items-center">
        <span>Đăng nhập</span>
        <span><a href="{{ route('auth.registerForm') }}" class="text-decoration-none">Đăng ký</a></span>
        </div>
        <form action="{{ route('auth.login') }}" method="POST" id="login-form">
            @csrf
            <p>Email đăng nhập</p>
            <input type="text" name="email" value="{{ old('email') }}">
            @error('email')
            <style>
                input[name="email"] {
                    border: 1px solid red;
                }
            </style>
            <span class="text-danger my-2">{{ $message }}</span>
            @enderror
{{--            <span class="text-danger error email-error"></span>--}}
            <p>Mật khẩu</p>
            <input type="password" name="password" value="{{ old('password')  }}">
            @error('password')
            <style>
                input[name="password"] {
                    border: 1px solid red;
                }
            </style>
            <span class="text-danger my-2">{{ $message }}</span>
            @enderror
{{--            <span class="text-danger error password-error"></span>--}}
                <button class="normal text-white">Đăng nhập</button>
            </form>
            {{-- <a href="#" class="text-decoration-none forget_pass">Quên mật khẩu?</a> --}}
    </div>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
{{--    <script src="{{ asset('assets/js/clients/login-form.js')  }}"></script>--}}
</body>
</html>
