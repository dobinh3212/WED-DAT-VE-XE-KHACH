@extends('client.layout.main')
@section('title')
Trang chủ
@endsection
@section('content')
<link rel="stylesheet" href="fontend/css3/owl.carousel.css">
<link rel="stylesheet" href="fontend/style.css">
<link rel="stylesheet" href="fontend/css3/responsive.css">
<script src="fontend/js/jquery-1.11.2.min.js"></script>
<script src="fontend/js3/owl.carousel.min.js"></script>
<script src="fontend/js3/jquery.sticky.js"></script>
<script src="fontend/js3/main.js"></script>
<div class="main">
    <!--  Slide -->
    <?php
    session_start();
    session_destroy();
    ?>
    @if(!empty($_SESSION['thongbao']))
    <div style="text-align: center;font-size: 20px;background: bisque;color: red;">{{$_SESSION['thongbao']}}</div>
    @endif
    <div class="mainleft">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $j = 0; ?>
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                @foreach($slide as $u)
                @if($j !=0)
                <li data-target="#myCarousel" data-slide-to="{{$j}}"></li>
                <?php $j = $j + 1; ?>
                @else
                <?php $j = $j + 1; ?>
                @endif
                @endforeach
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="height: 400px;">
                <div class="item active" onclick="location.href='{{url("tintuc")}}/{{$slide[0]->id}}';">
                    <img src="upload/{{$slide[0]->image}}" style="width:100%; height: 400px;">
                    <div class="carousel-caption">
                        <h3 style="width: 50%; margin-bottom: 5em;"><i>{{$slide[0]->title}}</i></h3>
                    </div>
                </div>
                <?php $i = 0; ?>
                @foreach($slide as $slides)
                @if($i !=0)
                <div class="item" onclick="location.href='{{url("tintuc")}}/{{$slides->id}}';">
                    <img src="upload/{{$slides->image}}" style="width:100%; height: 400px;">
                    <div class="carousel-caption">
                        <h3 style="width: 50%;margin-bottom: 5em;"><i>{{$slides->title}}</i></h3>
                    </div>
                </div>
                @else
                <?php $i = 1; ?>
                @endif
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div style="width: 1280px;margin-left: -1px;margin-top: 30px; min-height: 30px;" class="maindatve row">
        <!-- Form thông tin -->
        <div style="background-color: #f57812;margin-left: 557px;border-radius: 30px 30px 30px 30px;width: 20%;text-align: center;color: #FFF;height: 44px;">
            <h3 style="position: absolute;margin-top: 7px;margin-left: 56px;">Đặt vé nhanh</h3>
        </div>
        <form style="margin-top: 30px" action="{{route('chonchuyen')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-lg-4 diadiemdatve">
                <label>Chọn Nơi Khởi Hành</label>
                <i class="fa fa-bus"></i>
                <div class="the">
                    <select type="text" class="form-control txtnoidi" name="noidi" placeholder="Nơi đi">
                        <option value="">Chọn nơi đi</option>
                        @if(!empty($tinh_datve))
                        @foreach($tinh_datve as $tinhs)
                        <option value="{{$tinhs}}">{{$tinhs}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class=" col-lg-4 diadiemdatve">
                <label>Chọn Nơi Đến</label>
                <i class="fa fa-bus"></i>
                <select type="text" class="form-control txtnoidi" name="noiden" placeholder="Nơi đến">
                    <option value="">Chọn nơi đến</option>
                    @if(!empty($tinh_datve))
                    @foreach($tinh_datve as $tinhs)
                    <option value="{{$tinhs}}">{{$tinhs}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-lg-3 ngaydidatve">
                <label>Chọn Thời Gian đi </label>
                <div class="form-group" style="width: 350px;">
                    <div class='input-group date' style="box-shadow: 0 3px #F3AD45; ">
                        <span class="input-group-addon" style="background: #FFF; border: none;">
                            <span class="glyphicon glyphicon-calendar" style="color: #f57812;"></span>
                        </span>
                        <input type='date' class="form-control txtngaydi" style="border: none;" name="Ngaydi" id="txtdate" />
                    </div>
                </div>
                <div style="left: -409px;" class="tim">
                    <!-- <i class="fa fa-ticket icon-flat"></i> -->
                    <button type="submit" class="btn">Tìm vé</button>
                </div>
            </div>
        </form>

        <!-- Kết thúc form thông tin -->
    </div>
    <!-- <div style="clear: left;"></div> -->
    <!-- Kết phần tìm vé ở trang chủ -->
    <style>
        .float-contact {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 99999;
        }

        .chat-zalo {
            background: #8eb22b;
            border-radius: 20px;
            padding: 0 18px;
            color: white;
            display: block;
            margin-bottom: 6px;
        }

        .chat-face {
            background: #125c9e;
            border-radius: 20px;
            padding: 0 18px;
            color: white;
            display: block;
            margin-bottom: 6px;
        }

        .float-contact .hotline {
            background: #d11a59 !important;
            border-radius: 20px;
            padding: 0 18px;
            color: white;
            display: block;
            margin-bottom: 6px;
        }

        .chat-zalo a,
        .chat-face a,
        .hotline a {
            font-size: 15px;
            color: white;
            font-weight: 300;
            text-transform: none;
            line-height: 0;
        }

        @media (max-width: 549px) {
            .float-contact {
                display: none
            }

        }
    </style>
    <div style="margin-bottom: -20px; margin-left: 1140px;" class="float-contact">
        <button style=" height: 42px;" class="chat-zalo">
            <a href="https://zalo.me/dobinh1772">Chat Zalo</a>
        </button>
        <button style=" height: 42px;" class="hotline">
            <a href="tel:0372471772">Hotline: 0372.471.772</a>
        </button>
        <!-- <button style=" height: 42px;" class="hotline">
            <a href="dangky.html">Đăng ký ngay</a>
        </button> -->
    </div>
    <!-- Tuyến phổ biến -->

    <div style="margin-top: 10px;" class="tintuc">
        <div class="tentintuc">
            <h3>Tuyết xe phổ biến</h3>
        </div>
        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div style="width: 1280px;" class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <div class="product-carousel">
                                @foreach($lo_trinhs as $lo_trinh)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        @if (isset($lo_trinh) && $lo_trinh->image != null)
                                        <img style="height: 141px;" src="image/{{$lo_trinh->image??'' }}" alt="">
                                        <div class="product-hover">
                                            <a href="{{ route('tuyenxephobien', [$lo_trinh->id]) }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Đặt Vé</a>
                                        </div>
                                        @else
                                        <img style="height: 141px;" src="image/no_image.png" alt="">
                                        <div style="height: 141px;" class="product-hover">
                                            <a href="{{ route('tuyenxephobien', [$lo_trinh->id]) }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Đặt Vé</a>
                                        </div>
                                        @endif
                                    </div>
                                    <div style="margin-top: 7px;" class="col-md-12 d-flex">
                                        <div class="col-md-6 fa fa-map-marker icon">
                                            {{$lo_trinh->km}} Km
                                        </div>
                                        <div class="col-md-6 fa fa-clock-o icon">
                                            {{$lo_trinh->time_intend}}h
                                        </div>
                                    </div>
                                    <h2 style=" margin-top: 30px; font-weight: bold;text-align: center;"><a href="{{route('tuyenxephobien', [$lo_trinh->id])}}">{{$lo_trinh->route}}</a></h2>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End main content area -->

    <!-- Phần tin tức -->
    <hr>
    <div class="tintuc">
        <div class="tentintuc">
            <h3>Tin Tức Nổi Bật</h3>
        </div>
        <ul>
            @foreach($tintuc as $y)
            <li onclick="location.href='{{url("tintuc")}}/{{$y->id}}';">
                <img src="upload/{{$y->image}}">
                <a><strong>{{$y->title}}</strong></a>
            </li>
            @endforeach
        </ul>
        <div style="clear: left;"></div>
        <div class="tintucbutton">
            <button class="btn" onclick="location.href='{{url("tintuc")}}';"><a>Xem Toàn Bộ</a></button>
        </div>
    </div>
    <div style="clear: left;"></div>
    <!-- Kết phần tin tức -->
    <!-- Dịch vụ nổi bật -->
    <div class="dichvu">
        <h4>" Hãy đến với chúng tôi "</h4>
        <h2>Để Nhận Dịch Vụ Tốt Nhất !</h2>
        <div class="dv">
            <img src="images/free_wifi.png" />
            <br>
            <strong>Wifi Miễn Phí Mọi Nơi !</strong>
        </div>
        <div class="dv">
            <img src="images/dien.png" />
            <br>
            <strong>Ổ Cắm Theo Từng Chổ Ngồi !</strong>
        </div>
        <div class="dv">
            <img src="images/chongoi.png" />
            <br>
            <strong>Chổ Ngồi/Nằm Thỏa mái !</strong>
        </div>
    </div>
    <!-- Kết phần dịch vụ nổi bật -->
</div>
@endsection
@section('excontent')
<datalist id="diadiem" style="display: none;">
    @isset($tinh)
    @foreach($tinh as $t)
    <option value="{{$t->name}}">
        @endforeach
        @endisset
</datalist>
<div id="hienloitimchuyen" class="modal fade">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <div class="modal-header" style="background: rgb(0,64,87); color: #FFF; text-align: center;">
                <button class="close" data-dismiss="modal" style="color: white;opacity: 1;">&times;</button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- <script type="text/javascript">
         /*Xử lý input date của chọn ngày đi*/
        function chonngay(){
            var d = new Date();
            var ngay = d.getDate()<10? ('0'+d.getDate()):d.getDate();
            var thang = (d.getMonth() + 1) <10? ('0'+d.getMonth()+1):d.getMonth()+1;
            var nam = d.getFullYear();
            document.getElementById("txtdate").min=nam+"-"+thang+"-"+ngay;
            document.getElementById("txtdate").value= nam+"-"+thang+"-"+ngay;
        }
        chonngay();
        $(document).ready(function(){
            $("#timchuyendimain").click(function(){
                var noidi = $(".txtnoidi").val();
                var noiden = $(".txtnoiden").val();
                var ngaydi = $(".txtngaydi").val();
                var diadiem = $("#diadiem option");
                /*ngay di*/
                var d = new Date();
                var ngay = d.getDate()<10? ('0'+d.getDate()):d.getDate();
                var thang = d.getMonth() + 1 <10? ('0'+d.getMonth()+1):d.getMonth()+1;
                var nam = d.getFullYear();
                var ngayhientai =nam+"-"+thang+"-"+ngay;
                
                /*kiem tra noi di*/
                if(noidi == "" || noiden =="" || ngaydi==""){
                    $("#hienloitimchuyen .modal-body").html("Bạn phải nhập đủ thông tin!");
                    $("#hienloitimchuyen").modal("show");
                }
                else{
                    if(Date.parse(ngaydi)<Date.parse(ngayhientai)){  
                        $("#hienloitimchuyen .modal-body").html("Ngày đi không được nhỏ hơn ngày hiện tại!");
                        $("#hienloitimchuyen").modal("show");
                     }
                     else{
                    var ktnoidi =false;
                    var ktnoiden =false;
                    for(i=0;i<diadiem.length;i++){
                        if(noidi == diadiem[i].value)
                        {
                            ktnoidi = true;

                        }                   
                            if(noiden == diadiem[i].value)
                        {
                            ktnoiden = true;
                            
                        }
                    }

                    if(ktnoidi == false && ktnoiden == false){
                         $("#hienloitimchuyen .modal-body").html("Bạn phải nhập đúng nơi đi, nơi đến!");
                         $("#hienloitimchuyen").modal("show");    
                    }
                    else if(ktnoidi == false){
                        $("#hienloitimchuyen .modal-body").html("Bạn phải nhập đúng nơi đi!");
                         $("#hienloitimchuyen").modal("show");  
                    }
                    else if(ktnoiden == false){
                        $("#hienloitimchuyen .modal-body").html("Bạn phải nhập đúng nơi đến!");
                         $("#hienloitimchuyen").modal("show");  
                    }
                    else if(noidi == noiden){
                         $("#hienloitimchuyen .modal-body").html("Nơi đi không được trùng với nơi đến!");
                         $("#hienloitimchuyen").modal("show"); 
                    }
                    else{
                         document.forms["timve"].submit();
                    }
                }
                }
            });     
         });
    </script> -->
@endsection