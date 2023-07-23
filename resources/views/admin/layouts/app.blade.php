<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/imgs/clothes-hanger.png') }}" type="image/gif" sizes="16x16">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css')  }}">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <title>@yield('title','Dashboard')</title>
</head>
<body class="text-black">
@include('admin.layouts.header')
@yield('app')
@stack('script')
<script src="{{ asset('assets/js/admin/dashboard.js')  }}"></script>
</body>
</html>
