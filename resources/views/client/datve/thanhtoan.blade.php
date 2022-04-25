@extends('client.layout.main')
@section('title')
Thanh toán
@endsection
@section('content')

<!-- Phần bước  -->
<div class="buoc">
  <ul>
    <li onclick="vetrangtruoc3()" class="tay">Tìm Chuyến</li>
    <li onclick="vetrangtruoc2()" class="tay">Chọn Vé</li>
    <li onclick="vetrangtruoc()" class="tay">Chi tiết vé</li>
    <li style="background: #f57812; color: #FFF;" class="stay tay">Thanh toán</li>
  </ul>
</div>
<!-- kết thức phần bước  -->
<!-- Phần chọn vé  -->
<!-- <div class="step4"> -->
<div class="chonvemain">
  <div class="chonveleft">
    <h3 style="color: #032645;">Thông tin vé</h3>
    <p><i class="fa fa-bus"></i> Khách hàng: <a>{{Auth::guard('customer')->user()->name}}</a></p><br>
    <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>{{$route_bus->departure}}</a></p><br>
    <p><i class="fa fa-bus"></i> Nơi đến: <a>{{$route_bus->destination}}</a></p> <br>
    <p><i class="fa fa-bus"></i> Biển số xe: <a>{{$coach->license_plate}}</a></p> <br>
    <p><span class="glyphicon glyphicon-time"></span> Thời gian đi: {{$chonve->start_time}} : {{date('d-m-Y',strtotime($chonve->start_day))}} </p><br>
    <p><span class="glyphicon glyphicon-bed"></span> Loại Ghế: {{$type_buse->type_bus??''}} </p><br>
    <p><i class="fa fa-address-card-o"></i> Số vé: {{$sove}} vé</p><br>
    <p><i class="fa fa-balance-scale"></i> Tổng giá: {{($chonve->price *$sove)/1000}}.000 VNĐ</p><br>
  </div>
  <div class="chonveright">
    <div class="title_step4">
      <div>
        <br>
        <b style="color: #032645;margin-left: 146px;font-size: 25px;">
          Chọn hình thức thanh toán
        </b>
      </div>
    </div>
    <br>
    <br>
    <div>
      <form style="font-size: 18px;" method="post" action="{{ route('thanhtoan3') }}">
        @csrf
        <input style="margin-top: 0px;margin-left: 80px;" name="method_pay_id" type="radio" value="bank" checked> Thanh toán trực tiếp</br>
        <input style="margin-top: 20px;margin-left: 80px;" name="method_pay_id" type="radio" value="vnp"> Thanh toán VNPay <img style="width: 70px;" src="image/vnp.png"></br>
        <input style="margin-top: 20px;margin-left: 80px;" name="method_pay_id" type="radio" value="zalopayapp"> ZaloPay (Ví điện tử) <img style="width: 70px;" src="image/zalopay.png"></br>
        <input style="margin-top: 20px;margin-left: 80px;" name="method_pay_id" type="radio" value="zalopayatm"> ZaloPay (Thẻ ATM nội địa / Internet Banking)</br>
        <input style="margin-top: 20px;margin-left: 80px;" name="method_pay_id" type="radio" value="zalopayvisa"> ZaloPay (Thẻ quốc tế) <img style="width: 100px;" src="image/visa-master-icon-5.jpg"></br>
        <input type="hidden" name="buse_id" value="{{$chonve->id}}">
        <input type="hidden" name="departure" value="{{$route_bus->departure}}">
        <input type="hidden" name="destination" value="{{$route_bus->destination}}">
        <input type="hidden" name="start_time" value="{{$chonve->start_time}} : {{date('d-m-Y',strtotime($chonve->start_day))}}">
        <input type="hidden" name="loaighe" value="{{$type_buse->type_bus??''}}">
        <input type="hidden" name="sove" value="{{$sove??''}}">
        <input type="hidden" name="total" value="{{$chonve->price * $sove}}">

        <div style="text-align: center;margin-top: 70px;"><input style="width: 229px;" class="btn btn-primary " type="submit" value="Thanh toán"></div>
      </form>
    </div>
  </div>

</div>
<!-- kết thưc thông tin chuyến xe -->

@endsection
@section('script')
<script type="text/javascript">
  function vetrangtruoc() {
    history.back();
  }

  function vetrangtruoc2() {
    history.back();
    history.back();
  }
</script>
@endsection