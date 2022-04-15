@extends('client.layout.main')
@section('title')
Chọn vé
@endsection
@section('content')

<!-- Phần chọn vé  -->
<div class="chonvemain">
    <!-- Thông tin chuyến xe -->
    <div style="width: 53%;margin-left:300px" class="chonveleft">
        <h3>Thông tin vé đã đặt</h3>
        <p>Mã đơn hàng: <a>{{$order_ticket->id}}</a></p>
        <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>{{$route_bus->departure}}</a></p>
        <p><i class="fa fa-bus"></i> Nơi đến: <a>{{$route_bus->destination}}</a></p>
        <p><span class="glyphicon glyphicon-time"></span> Ngày đi: {{$chonve->start_time}} : {{date('d-m-Y',strtotime($chonve->start_day))}} </p>
        <p><span class="glyphicon glyphicon-bed"></span> Loại Ghế: {{$type_buse->type_bus??''}} </p>
        <p><i class="fa fa-balance-scale"></i> Giá vé: {{($chonve->price)/1000}}.000 VNĐ / 1 vé</p>
        <p><i class="fa fa-balance-scale"></i> Tổng tiền: {{($order_ticket->total)/1000}}.000 VNĐ </p>
        <br>
        <h4 style="color: rgb(0,64,87);">Nhân viên chúng tôi sẻ liên hệ với quý khách để quý khách thanh toán tiền.</h4>
        <h3 style=" color: rgb(0,64,87);">Chúc quý khách có một chuyến đi vui vẻ.</3>
    </div>

</div>
<!-- kết thưc thông tin chuyến xe -->

@endsection