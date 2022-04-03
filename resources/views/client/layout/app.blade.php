<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title', get_setting('website_name').' - '.get_setting('website_description'))</title>
    <meta name="keywords" content="@yield('meta_keywords',get_setting('website_description'))">
    <meta name="description" content="@yield('meta_description',get_setting('website_description'))">
    <meta property="og:title" content="@yield('title', get_setting('website_name').' - '.get_setting('website_description'))" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="@yield('meta_og_image', get_setting('meta_og_image'))" />
    <meta property="og:description" content="@yield('meta_description',get_setting('website_description'))">
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="author" content="{{get_setting('website_name')}}"" />
    <meta name=" copyright" content="{{get_setting('website_name')}}"" />
    <link rel=" icon" type="image/x-icon" href="{{ URL::asset('client/assets/fav-icon.png') }}" />
    <script src="{{ URL::asset('client/js/all.js') }}" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="client/css/footer.css" rel="stylesheet">
    <style type="text/css">
        @font-face {
            font-family: GoogleSansRegular;
            src: url("{{ URL::asset('fonts/GoogleSans-Regular.ttf') }}");
        }

        @font-face {
            font-family: GoogleSansBold;
            src: url("{{ URL::asset('fonts/GoogleSans-Bold.ttf') }}");
        }
    </style>
    <link href="{{ URL::asset('client/css/steps.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('client/css/styles.css') }}" rel="stylesheet" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5VPBFR5BF5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5VPBFR5BF5');
    </script>
</head>

<body id="page-top">
    <!-- Navigation-->
    @include('client.layout.navbar')
    <div class="content_client">
        @yield('content_client')
    </div>
    @include('client.layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6104b90c649e0a0a5ccec5a3/1fp98kohd';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    <!--End of Tawk.to Script-->


    <!-- <div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="300"> </div>
    <script src="https://sp.zalo.me/plugins/sdk.js"> </script> -->


    <!-- điện thoại -->

    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a href="tel:{{ hotline_zalo() }}" class="pps-btn-img">
                    <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
                </a>
            </div>
        </div>
        <div class="hotline-bar">
            <a href="tel:{{ hotline_zalo() }}"></a>
        </div>
    </div>

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
            /* width: 39px !important; */
            /* left: 33px; */
            /* bottom: 37px; */
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
    </style>

    <!-- zalo -->

    <a href="https://chat.zalo.me/?phone={{ hotline_zalo() }}" id="linkzalo" target="_blank" rel="noopener noreferrer">

        <div class="fcta-zalo-vi-tri-nut">
            <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut">
                <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6">
                        <path fill="currentColor" class="st0" d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"></path>
                    </svg></div>
                <div id="fcta-zalo-tracking" class="fcta-zalo-text">Chat ngay</div>
            </div>
        </div>
    </a>
    <!-- </div> -->
    <style>
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

        .fcta-zalo-ben-trong-nut svg path {
            fill: #fff
        }

        .fcta-zalo-vi-tri-nut {
            /* position: fixed;
bottom: 24px;
right: 20px;
z-index: 999 */

            position: fixed;
            bottom: 105px;
            /* right: 20px; */
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
    </style>

    <!-- facebook -->

    <a href="{{ hotline_fb() }}" id="linkzalo" target="_blank" rel="noopener noreferrer">

        <div class="fcta-zalo-vi-tri-nu">
            <div id="kk" class="fcta-zalo-nen-nu">
                <div id="kk" class="fcta-zalo-ben-trong-nu">
                    <!-- <path fill="currentColor" class="st0" d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"></path> -->
                    <img style="width: 35px;margin-bottom: 10px;margin-left: -2px;" src="/image/package/messenger.png">
                    <!-- </svg> -->
                </div>
                <div id="kk" class="fcta_fb">Chat ngay</div>
            </div>
        </div>
    </a>
    <!-- </div> -->
    <style>
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
            /* position: fixed;
bottom: 24px;
right: 20px;
z-index: 999 */

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
            color: #fff
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

        .fcta_fb {
            font-family: Roboto
        }
    </style>

</body>

</html>