<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        <span><a href="#" class="text-decoration-none">Đăng ký</a></span>
        </div>
        <form action="" method="POST">
            <p>Tên đăng nhập</p>
            <input type="text" name="email">
            <p>Mật khẩu</p>
            <input type="text" name="password">
            <button class="normal text-white">Đăng nhập</button>
        </form>
        <a href="#" class="text-decoration-none forget_pass">Quên mật khẩu?</a>
    </div>
</body>
</html>
