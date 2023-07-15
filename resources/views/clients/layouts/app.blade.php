<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Home Page')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/clients/home-client.css')  }}">
</head>
<body>
    @include('clients.layouts.header')
    @yield('app')
    @include('clients.layouts.footer')
</body>
</html>