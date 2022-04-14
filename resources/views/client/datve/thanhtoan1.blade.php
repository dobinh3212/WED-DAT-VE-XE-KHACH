@extends('client.layout.main')
@section('title')
Chọn vé
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
<div class="chonvemain">
  <!-- Thông tin chuyến xe -->
  <div class="chonveleft">
    <?php $makh = Session::get('makh'); ?>
    <h3>Thông tin vé</h3>
    <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>{{$route_bus->departure}}</a></p><br>
    <p><i class="fa fa-bus"></i> Nơi đến: <a>{{$route_bus->destination}}</a></p> <br>
    <p><span class="glyphicon glyphicon-time"></span> Thời gian đi: {{$chonve->start_time}} : {{date('d-m-Y',strtotime($chonve->start_day))}} </p><br>
    <p><span class="glyphicon glyphicon-bed"></span> Loại Ghế: {{$type_buse->type_bus??''}} </p><br>
    <p><i class="fa fa-address-card-o"></i> Số vé: {{$sove??''}} vé </p><br>
    <p><i class="fa fa-balance-scale"></i> Tổng giá: {{($chonve->price * $sove)}} VNĐ</p><br>

    <form action="{{route('thanhtoan2')}}" method="POST">
      @csrf
      <input type="hidden" name="buse_id" value="{{$chonve->buse_id}}">
      <input type="hidden" name="departure" value="{{$route_bus->departure}}">
      <input type="hidden" name="destination" value="{{$route_bus->destination}}">
      <input type="hidden" name="start_time" value="{{$chonve->start_time}} : {{date('d-m-Y',strtotime($chonve->start_day))}}">
      <input type="hidden" name="loaighe" value="{{$type_buse->type_bus??''}}">
      <input type="hidden" name="sove" value=" {{$sove??''}}">
      <input type="hidden" name="total" value="{{($chonve->price * $sove)}}">
      <button type="submit" style="background: #f57812; border: none;" class="btn btn-success chondatve">Thanh toán</button>
    </form>
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