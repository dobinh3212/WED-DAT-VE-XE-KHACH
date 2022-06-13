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


<body>

    <!-- nút zalo, điện thoại -->
    <style>
        .hotline-phone-ring-wrap {
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 999999;
        }

        .hotline-phone-ring {
            position: relative;
            visibility: visible;
            background-color: transparent;
            width: 110px;
            height: 110px;
            cursor: pointer;
            z-index: 11;
            -webkit-backface-visibility: hidden;
            -webkit-transform: translateZ(0);
            transition: visibility .5s;
            left: 0;
            bottom: 0;
            display: block;
        }

        .hotline-phone-ring-circle {
            width: 85px;
            height: 85px;
            top: 10px;
            left: 10px;
            position: absolute;
            background-color: transparent;
            border-radius: 100%;
            border: 2px solid #e60808;
            -webkit-animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
            animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
            transition: all .5s;
            -webkit-transform-origin: 50% 50%;
            -ms-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            opacity: 0.5;
        }

        .hotline-phone-ring-circle-fill {
            width: 55px;
            height: 55px;
            top: 25px;
            left: 25px;
            position: absolute;
            background-color: rgba(230, 8, 8, 0.7);
            border-radius: 100%;
            border: 2px solid transparent;
            -webkit-animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
            animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
            transition: all .5s;
            -webkit-transform-origin: 50% 50%;
            -ms-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
        }

        .hotline-phone-ring-img-circle {
            background-color: #e60808;
            width: 33px;
            height: 33px;
            top: 37px;
            left: 37px;
            position: absolute;
            background-size: 20px;
            border-radius: 100%;
            border: 2px solid transparent;
            -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
            animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
            -webkit-transform-origin: 50% 50%;
            -ms-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hotline-phone-ring-img-circle .pps-btn-img {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }

        .hotline-phone-ring-img-circle .pps-btn-img img {
            width: 20px;
            height: 20px;
        }

        .hotline-bar {
            position: absolute;
            background: rgba(230, 8, 8, 0.75);
            height: 40px;
            width: 180px;
            line-height: 40px;
            border-radius: 3px;
            padding: 0 10px;
            background-size: 100%;
            cursor: pointer;
            transition: all 0.8s;
            -webkit-transition: all 0.8s;
            z-index: 9;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.1);
            border-radius: 50px !important;
            /* width: 175px !important; */
            left: 33px;
            bottom: 37px;
        }

        .hotline-bar>a {
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            text-indent: 50px;
            display: block;
            letter-spacing: 1px;
            line-height: 40px;
            font-family: Arial;
        }

        .hotline-bar>a:hover,
        .hotline-bar>a:active {
            color: #fff;
        }

        @-webkit-keyframes phonering-alo-circle-anim {
            0% {
                -webkit-transform: rotate(0) scale(0.5) skew(1deg);
                -webkit-opacity: 0.1;
            }

            30% {
                -webkit-transform: rotate(0) scale(0.7) skew(1deg);
                -webkit-opacity: 0.5;
            }

            100% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
                -webkit-opacity: 0.1;
            }
        }

        @-webkit-keyframes phonering-alo-circle-fill-anim {
            0% {
                -webkit-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.6;
            }

            50% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
                opacity: 0.6;
            }

            100% {
                -webkit-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.6;
            }
        }

        @-webkit-keyframes phonering-alo-circle-img-anim {
            0% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
            }

            10% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
            }

            20% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
            }

            30% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
            }

            40% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
            }

            50% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
            }

            100% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
            }
        }

        @media (max-width: 768px) {
            .hotline-bar {
                display: none;
            }
        }

        .social-button {
            display: inline-grid;
            position: fixed;
            background-color: rgba(255, 255, 255, 0) !important;
            bottom: 15px;
            right: 20px;
            min-width: 45px;
            text-align: center;
            z-index: 99999;
        }

        .social-button-content {
            display: inline-grid;
        }

        .social-button a {
            padding: 8px 0;
            cursor: pointer;
            position: relative;
        }

        .social-button i {
            width: 40px;
            height: 40px;
            background: #F05A5E;
            color: #fff;
            border-radius: 100%;
            font-size: 20px;
            text-align: center;
            line-height: 1.9;
            position: relative;
            z-index: 999;
        }

        .social-button span {
            display: none;
        }

        .mes:hover>span,
        .zalo:hover>span {
            display: block
        }

        .social-button a span {
            border-radius: 2px;
            text-align: center;
            background: #ffffff;
            padding: 9px;
            display: none;
            width: 180px;
            margin-right: 10px;
            position: absolute;
            color: #ffffff;
            z-index: 999;
            top: 9px;
            right: 20px;
        }
    </style>
    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a href="tel:0372471772" class="pps-btn-img">
                    <img src="https://nocodebuilding.com/wp-content/uploads/2020/07/icon-call-nh.png" alt="Gọi điện thoại" width="50">
                </a>
            </div>
        </div>
        <!-- <div class="hotline-bar">
            <a href="tel:0989333069">
                <span class="text-hotline">0372.471.772</span>
            </a>
        </div> -->
    </div>
    <style>
        .jscroll-to-top {
            bottom: 100px
        }

        .fcta-zalo-ben-trong-nut svg path {
            fill: #fff
        }

        .fcta-zalo-vi-tri-nut {
            position: fixed;
            bottom: 105px;
            z-index: 999;
            left: 29px;
        }

        .fcta-zalo-nen-nut,
        div.fcta-zalo-mess {
            box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)
        }

        .fcta-zalo-nen-nut {
            width: 50px;
            height: 50px;
            text-align: center;
            color: #fff;
            background: #0068ff;
            border-radius: 50%;
            position: relative
        }

        .fcta-zalo-nen-nut::after,
        .fcta-zalo-nen-nut::before {
            content: "";
            position: absolute;
            border: 1px solid #0068ff;
            background: #0068ff80;
            z-index: -1;
            left: -20px;
            right: -20px;
            top: -20px;
            bottom: -20px;
            border-radius: 50%;
            animation: zoom 1.9s linear infinite
        }

        .fcta-zalo-nen-nut::after {
            animation-delay: .4s
        }

        .fcta-zalo-ben-trong-nut,
        .fcta-zalo-ben-trong-nut i {
            transition: all 1s
        }

        .fcta-zalo-ben-trong-nut {
            position: absolute;
            text-align: center;
            width: 60%;
            height: 60%;
            left: 10px;
            bottom: 25px;
            line-height: 70px;
            font-size: 25px;
            opacity: 1
        }

        .fcta-zalo-ben-trong-nut i {
            animation: lucidgenzalo 1s linear infinite
        }

        .fcta-zalo-nen-nut:hover .fcta-zalo-ben-trong-nut,
        .fcta-zalo-text {
            opacity: 0
        }

        .fcta-zalo-nen-nut:hover i {
            transform: scale(.5);
            transition: all .5s ease-in
        }

        .fcta-zalo-text a {
            text-decoration: none;
            color: #fff
        }

        .fcta-zalo-text {
            position: absolute;
            top: 6px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            transform: scaleX(-1);
            transition: all .5s;
            line-height: 1.5
        }

        .fcta-zalo-nen-nut:hover .fcta-zalo-text {
            transform: scaleX(1);
            opacity: 1
        }

        div.fcta-zalo-mess {
            position: fixed;
            bottom: 29px;
            right: 58px;
            z-index: 99;
            background: #fff;
            padding: 7px 25px 7px 15px;
            color: #0068ff;
            border-radius: 50px 0 0 50px;
            font-weight: 700;
            font-size: 15px
        }

        .fcta-zalo-mess span {
            color: #0068ff !important
        }

        span#fcta-zalo-tracking {
            font-family: Roboto;
            line-height: 1.5
        }

        .fcta-zalo-text {
            font-family: Roboto
        }

        @keyframes zoom {
            0% {
                transform: scale(.5);
                opacity: 0
            }

            50% {
                opacity: 1
            }

            to {
                opacity: 0;
                transform: scale(1)
            }
        }

        @keyframes lucidgenzalo {
            0% to {
                transform: rotate(-25deg)
            }

            50% {
                transform: rotate(25deg)
            }
        }

        .jscroll-to-top {
            bottom: 100px
        }

        .fcta-zalo-ben-trong-nu svg path {
            fill: #fff
        }

        .fcta-zalo-vi-tri-nu {
            position: fixed;
            bottom: 190px;
            /* right: 20px; */
            z-index: 999;
            left: 29px;
        }

        .fcta-zalo-nen-nu,
        div.fcta-zalo-mess {
            box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)
        }

        .fcta-zalo-nen-nu {
            width: 50px;
            height: 50px;
            text-align: center;
            color: #fff;
            background: #0068ff;
            border-radius: 50%;
            position: relative
        }

        .fcta-zalo-nen-nu::after,
        .fcta-zalo-nen-nu::before {
            content: "";
            position: absolute;
            border: 1px solid #0068ff;
            background: #0068ff80;
            z-index: -1;
            left: -20px;
            right: -20px;
            top: -20px;
            bottom: -20px;
            border-radius: 50%;
            animation: zoom 1.9s linear infinite
        }

        .fcta-zalo-nen-nu::after {
            animation-delay: .4s
        }

        .fcta-zalo-ben-trong-nu,
        .fcta-zalo-ben-trong-nu i {
            transition: all 1s
        }

        .fcta-zalo-ben-trong-nu {
            position: absolute;
            text-align: center;
            width: 60%;
            height: 60%;
            left: 10px;
            bottom: 25px;
            line-height: 70px;
            font-size: 25px;
            opacity: 1
        }

        .fcta-zalo-ben-trong-nu i {
            animation: lucidgenzalo 1s linear infinite
        }

        .fcta-zalo-nen-nu:hover .fcta-zalo-ben-trong-nu,
        .fcta_fb {
            opacity: 0
        }

        .fcta-zalo-nen-nu:hover i {
            transform: scale(.5);
            transition: all .5s ease-in
        }

        .fcta_fb a {
            text-decoration: none;
            color: #fff;
            font-family: Roboto
        }

        .fcta_fb {
            position: absolute;
            top: 6px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            transform: scaleX(-1);
            transition: all .5s;
            line-height: 1.5
        }

        .fcta-zalo-nen-nu:hover .fcta_fb {
            transform: scaleX(1);
            opacity: 1
        }

        div.fcta-zalo-mess {
            position: fixed;
            bottom: 29px;
            right: 58px;
            z-index: 99;
            background: #fff;
            padding: 7px 25px 7px 15px;
            color: #0068ff;
            border-radius: 50px 0 0 50px;
            font-weight: 700;
            font-size: 15px
        }

        .fcta-zalo-mess span {
            color: #0068ff !important
        }

        span#kk {
            font-family: Roboto;
            line-height: 1.5
        }
    </style>
    <a href="https://zalo.me/dobinh1772" id="linkzalo" target="_blank" rel="noopener noreferrer">

        <div class="fcta-zalo-vi-tri-nut">
            <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut">
                <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6">
                        <path fill="currentColor" class="st0" d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"></path>
                    </svg></div>
                <div id="fcta-zalo-tracking" class="fcta-zalo-text">Chat ngay</div>
            </div>
        </div>
    </a>
    <!-- facebook -->
    <a href="https://zalo.me/dobinh1772" id="linkzalo" target="_blank" rel="noopener noreferrer">

        <div class="fcta-zalo-vi-tri-nu">
            <div id="kk" class="fcta-zalo-nen-nu">
                <div id="kk" class="fcta-zalo-ben-trong-nu">
                    <img style="width: 35px;margin-bottom: 10px;margin-left: -2px;" src="https://web.vinaseco.vn/image/package/messenger.png">
                </div>
                <div id="kk" class="fcta_fb">Chat ngay</div>
            </div>
        </div>
    </a>
    <!-- phần header -->
    <div class="header">
        <!-- Logo -->
        <img class="headerlogo" src="{{asset("/upload/setting/$setting->image")}}" onclick="location.href='{{url("/")}}';" height="40">
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