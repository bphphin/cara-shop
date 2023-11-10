<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }

        .success-icon {
            font-size: 48px;
            color: #4CAF50;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .email-link {
            color: #007BFF;
            text-decoration: none;
        }

        .email-link:hover {
            text-decoration: underline;
        }

        .note {
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
<div class="container">
    <span class="success-icon">&#10004;</span>
    <h1>Đăng ký thành công!</h1>
    @if(Auth::check())
        <p>Xin chào {{ Auth::user()->name  }}</p>
    @endif
{{--    <p>Xin chào</p>--}}
    <p>Cảm ơn bạn đã đăng ký thành công tại trang web của chúng tôi.</p>
    <p>Một email xác nhận đã được gửi đến địa chỉ email mà bạn đã cung cấp.</p>
    <p>Vui lòng kiểm tra hòm thư và nhấp vào liên kết xác nhận để hoàn tất quá trình đăng ký.</p>
    <p>Nếu bạn không nhận được email xác nhận, vui lòng kiểm tra hòm thư rác hoặc <a class="email-link"
                                                                                     href="mailto:support@example.com">liên
            hệ chúng tôi</a> để được hỗ trợ.</p>
    <p class="note">Hãy chắc chắn rằng bạn đã nhập đúng địa chỉ email khi đăng ký.</p>
</div>
</body>
</html>
