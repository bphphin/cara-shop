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
    {{--  tailwind  --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- ckeditor   --}}
    {{--  sweet alert  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <title>@yield('title','Dashboard')</title>
</head>
<body class="text-black">
@include('admin.layouts.header')
@yield('app')
@include('sweetalert::alert')
@stack('script')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{ asset('assets/js/admin/dashboard.js')  }}"></script>
{{-- Sweet alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>
