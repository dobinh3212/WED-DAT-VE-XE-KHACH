<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/icons/bus1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="css/css-lienhe/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/css-lienhe/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style-lienhe.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('ckfinder/ckfinder.js')}}"></script>

</head>
<style>

</style>

<body>
    <!-- phần header -->
    <div class="header">
        <!-- Logo -->
        <img class="headerlogo" src="{{asset('images/logo1.png')}}" onclick="location.href='{{url("/")}}';" height="40">
        <!-- Phần Chữ chạy  -->
        <div style="width: 70%;color: #FFF; float: left;">
            <div style="width: 70%; margin-left:40%; margin-top: 10px;">
                <marquee direction="left">CHÀO MỪNG BẠN ĐẾN VỚI WEBSITE CỦA CHÚNG TÔI, CHÚC BẠN CÓ CHUYẾN ĐI VUI VẺ !</marquee>
            </div>
        </div>
        @if(Auth::guard('customer')->user())
        <ul>
            <li><a href="{{route('logout_customer')}}" style="line-height: 40px;color: #FFF;">( Đăng xuất )</a></li>
            <li style="color: #FFF;line-height: 40px;" class="dropdown">
                <i class="fa fa-address-book-o" style="font-size:20px; margin-right: 3px;"></i>
                <a href="#" style="color: #CCC; cursor: pointer;" data-toggle="dropdown">{{Auth::guard('customer')->user()->name}}</a>
                <ul class="dropdown-menu">
                    <li><a style="margin-left: -160px;" href="{{route('thongtin')}}">Thông tin cá nhân</a></li>
                    <li><a href="{{route('lichsudatve')}}">Thông tin vé đã đặt</a></li>
                </ul>
            </li>
        </ul>
        @else
        <!-- Hiện số điện thoại, đăng xuất -->
        <ul>
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">Đăng ký</button></li>
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">Đăng nhập</button></li>
        </ul>

        @endif
    </div>
    <!-- Kết phần header -->
    <!-- Phần Menu  -->
    <div class="menu">
        <ul>
            <li><a href="{{asset('/')}}"><i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                    <span>TRANG CHỦ</span>
                </a>
            </li>
            <li>
                <a href="{{asset('/datve')}}">
                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                    <span>ĐẶT VÉ</span>
                </a>
            </li>
            <li>
                <a href="{{asset('/tintuc')}}">
                    <i class="glyphicon glyphicon-text-size" aria-hidden="true"></i>
                    <span>TIN TỨC</span>
                </a>
            </li>
            <li>
                <a href="{{asset('/gioithieu')}}">
                    <i class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></i>
                    <span>GIỚI THIỆU</span>
                </a>
            </li>
            <li>
                <a href="{{route('lienhe')}}">
                    <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                    <span>LIÊN HỆ</span>
                </a>
            </li>
        </ul>
    </div>
    <div style="clear: both;"></div>
    <!-- Kết Phần Menu -->
    @yield('content')
    <div style="clear: both;"></div>
    <!-- Phần footer -->

    @include('client.layout.footer')
    <!-- Kết phần footer -->
    @yield('excontent')
    @extends('client.auth.login')
    @extends('client.auth.register')
    @yield('script')
</body>