<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
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
        <span>Đăng ký</span>
        <span><a href="{{ route('auth.loginForm') }}" class="text-decoration-none">Đăng nhập</a></span>
        </div>
        <form action="" method="POST">
            @csrf
            <p>Họ và tên</p>
            <input type="text" name="name">
            <p>Email</p>
            <input type="text" name="email">
            <p>Mật khẩu</p>
            <input type="password" name="name">
            <p>Xác nhận mật khẩu</p>
            <input type="password" name="password">
            <button class="normal text-white">Đăng ký</button>
        </form>
    </div>
</body>
</html>
