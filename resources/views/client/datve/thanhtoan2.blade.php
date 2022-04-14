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
<!-- <div class="step4"> -->
<div class="chonvemain">
  <div class="chonveleft">
    <div class="title_step4">
      <div>
        <br>
        <b style="margin-left: 146px;font-size: 25px;">
          Chọn hình thức thanh toán
        </b>
      </div>
    </div>
    <br>
    <br>
    <div>
      <form method="post" action="{{ route('thanhtoan3') }}">
        @csrf
        <input style="margin-top: 0px;margin-left: 40px;" name="method_pay_id" type="radio" value="bank" checked> Chuyển khoản ngân hàng</br>
        <input style="margin-top: 20px;margin-left: 40px;" name="method_pay_id" type="radio" value="zalopayapp"> ZaloPay (Ví điện tử) <img style="width: 70px;" src="https://www.tiendauroi.com/wp-content/uploads/2020/02/zalopay.png"></br>
        <input style="margin-top: 20px;margin-left: 40px;" name="method_pay_id" type="radio" value="zalopayatm"> ZaloPay (Thẻ ATM nội địa / Internet Banking)</br>
        <input style="margin-top: 20px;margin-left: 40px;" name="method_pay_id" type="radio" value="zalopayvisa"> ZaloPay (Thẻ quốc tế) <img style="width: 100px;" src="https://icon-library.com/images/visa-master-icon/visa-master-icon-5.jpg"></br>
        <input type="hidden" name="buse_id" value="{{$request->id}}">
        <input type="hidden" name="departure" value="{{$request->departure}}">
        <input type="hidden" name="destination" value="{{$request->destination}}">
        <input type="hidden" name="start_time" value="{{$request->start_time}}">
        <input type="hidden" name="loaighe" value="{{$request->loaighe??''}}">
        <input type="hidden" name="sove" value=" {{$request->sove??''}}">
        <input type="hidden" name="total" value="{{$request->total}}">

        <div style="text-align: center;margin-top: 70px;"><input class="btn btn-primary " type="submit" value="Thanh toán"></div>
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