@extends('client.layout.main')
@section('title')
Thanh toán thành công
@endsection
@section('content')

<!-- Phần chọn vé  -->
<div class="chonvemain">
    <!-- Thông tin chuyến xe -->
    <div style="margin-left: 143px;width: 80%;" class="col-sm-12 chonveleft">
        <h3>Thông báo thanh toán thành công!</h3>
        <div class="col-sm-6">
            <h3 style="font-size:20px; color: rgb(0,64,87);">Thông tin khách hàng</h3>
            <p>Mã khách hàng: <a>{{Auth::guard('customer')->user()->id}}</a></p>
            <p>Tên khách hàng: <a>{{Auth::guard('customer')->user()->name??''}}</a></p>
            <p>Ngày Sinh: {{date('d-m-Y',strtotime(Auth::guard('customer')->user()->date_birth??''))}}</p>
            <p>Email: {{Auth::guard('customer')->user()->email??''}}</p>
            <p>Điện thoại: {{Auth::guard('customer')->user()->phone??''}}</p>
            <br>
        </div>
        <div class="col-sm-6">
            <h3 style="font-size:20px;color: rgb(0,64,87);">Thông tin vé xe</h3>
            <p><i class="glyphicon glyphicon-barcode"></i> Mã đơn hàng: <a>{{$order_ticket->id}}</a></p>
            <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>{{$route_bus->departure}}</a></p>
            <p><i class="fa fa-bus"></i> Nơi đến: <a>{{$route_bus->destination}}</a></p>
            <p><i class="fa fa-bus"></i> Biển số xe: <a>{{$coach->license_plate}}</a></p>
            <p><span class="glyphicon glyphicon-time"></span> Ngày đi: {{$buse->start_time}} : {{date('d-m-Y',strtotime($buse->start_day))}} </p>
            <p><span class="glyphicon glyphicon-bed"></span> Loại Ghế: {{$type_buse->type_bus??''}} </p>
            <p><i class="fa fa-balance-scale"></i> Giá vé: {{($buse->price)/1000}}.000 VNĐ / 1 vé</p>
            <p><i class="glyphicon glyphicon-sound-5-1"></i> Số vé: {{$order_ticket->number}} vé</p>
            <p><i class="glyphicon glyphicon-usd"></i> Tổng tiền: {{($order_ticket->total)/1000}}.000 VNĐ </p>
            <br>
            <div style="text-align: center;">
                {!! $qrCode !!}
                <h4>Quý khách vui lòng lưu lại mã QR, không chia sẻ cho người khác.</h4>
            </div>
        </div>
        <h3 style=" color: rgb(0,64,87);">Chúc quý khách có một chuyến đi vui vẻ.</h3>
    </div>

</div>
<!-- kết thưc thông tin chuyến xe -->

@endsection