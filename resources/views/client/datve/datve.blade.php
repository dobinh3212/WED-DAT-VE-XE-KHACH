@extends('client.layout.main')
@section('title')
Đặt vé
@endsection
@section('content')
<!-- Phần bước -->
<div class="buoc">
    <ul>
        <li style="background: #f57812; color: #FFF;" class="stay tay">Tìm Chuyến</li>
        <li>Chọn Chuyến</li>
        <li>Chi Tiết Vé</li>
        <li>Thanh toán</li>
    </ul>
</div>
<!-- kết thúc phần bước -->
<!-- Phần tìm vé -->
<div class="maindatve row">
    <!-- Form thông tin -->
    <form action="{{route('chonchuyen')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class=" col-lg-4 diadiemdatve">
            <label>Chọn Nơi Khởi Hành</label>
            <i class="fa fa-bus"></i>
            <div class="the">
                <select type="text" class="form-control txtnoidi" name="noidi" placeholder="Nơi đi">
                    @if(!empty($tinh))
                    <option value="">Chọn nơi khởi hành</option>
                    @foreach($tinh as $tinhs)
                    <option value="{{$tinhs}}">{{$tinhs}}</option>
                    @endforeach
                    @elseif(!empty($departure))
                    <option value="{{$departure}}">{{$departure}}</option>
                    @endif
                </select>
            </div>
            <div class="chonloaixe">
                <p>Chọn loại xe</p>
                <input checked="checked" name="loaixe" type="radio" value="1" />Giường nằm
                <br>
                <input type="radio" name="loaixe" value="0" />Ghế ngồi
            </div>
        </div>
        <div class=" col-lg-4 diadiemdatve">
            <label>Chọn Nơi Đến</label>
            <i class="fa fa-bus"></i>
            <select type="text" class="form-control txtnoidi" name="noiden" placeholder="Nơi đi">
                @if(!empty($tinh))
                <option value="">Chọn nơi đến</option>
                @foreach($tinh as $tinhs)
                <option value="{{$tinhs}}">{{$tinhs}}</option>
                @endforeach
                @elseif(!empty($destination))
                <option value="{{$destination}}">{{$destination}}</option>
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
            <div class="tim">
                <i class="fa fa-ticket icon-flat"></i>
                <button type="submit" class="btn">Tìm vé</button>
            </div>
        </div>
    </form>

    <!-- Kết thúc form thông tin -->
</div>
<!-- Kết thúc phần tìm vé -->
@endsection
<!-- @section('excontent')

<div id="hienloidatve" class="modal fade">
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
@endsection -->