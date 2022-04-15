@extends('client.layout.main')
@section('title')
Chọn vé
@endsection
@section('content')

<!-- Phần bước  -->
<div class="buoc">
  <ul>
    <li onclick="vetrangtruoc2()" class="tay">Tìm Chuyến</li>
    <li onclick="vetrangtruoc()" class="tay">Chọn chuyến</li>
    <li style="background: #f57812; color: #FFF;" class="stay tay">Chi Tiết vé</li>
    <li>Thanh toán</li>
  </ul>
</div>
<!-- kết thức phần bước  -->
<!-- Phần chọn vé  -->
<div class="chonvemain">
  <!-- Thông tin chuyến xe -->
  <div style="margin-left:300px" class="chonveleft">
    <h3>Thông tin vé</h3>
    <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>{{$route_bus->departure}}</a></p><br>
    <p><i class="fa fa-bus"></i> Nơi đến: <a>{{$route_bus->destination}}</a></p> <br>
    <p><span class="glyphicon glyphicon-time"></span> Ngày đi: {{$chonve->start_time}} : {{date('d-m-Y',strtotime($chonve->start_day))}} </p><br>
    <p><span class="glyphicon glyphicon-bed"></span> Loại Ghế: {{$type_buse->type_bus??''}} </p><br>
    <p><i class="fa fa-balance-scale"></i> Giá vé: {{($chonve->price)/1000}}.000 VNĐ / 1 vé</p><br>
    <form action="{{route('thanhtoan')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <p><i class="fa fa-address-card-o"></i> Số vé: <b class="vedangchon">
          <input type="number" name="number" value='1' min="1" max="5">
          <input type="hidden" name="id" value="{{$chonve->id}}">
        </b> </p><br>
      <button type="submit" style="background: #f57812; border: none;" class="btn btn-success chondatve">Thanh toán</button>
    </form>
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