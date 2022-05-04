@extends('client.layout.main')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<div>
    <div class="modal-dialog" style="width: 500px;">
        <!-- Đổi thông tin-->
        @include('flash::message')
        <div class="modal-content">
            <div class="modal-header" style="background: rgb(0,64,87); color: #FFF; text-align: center;">
                <button type="button" class="close" data-dismiss="modal" style="color: white;opacity: 1;">&times;</button>
                <h4 class="modal-title">Đổi Thông Tin</h4>
            </div>
            <form action="{{ url('/change_profile') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="hienloi">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control dttname" name="name" value="{{Auth::guard('customer')->user()->name??''}}" placeholder="Họ và tên">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-hourglass"></span></span>
                            <input type="date" name="ngaysinh" class="form-control dttngaysinh">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-transgender-alt"></i></span>
                            <label class="checkbox-inline" style="color: #000;margin-left: -308px;">
                                <input type="radio" name="txtgioitinh" value="1" checked>Nam
                            </label>
                            <label class="checkbox-inline" style="color: #000;">
                                <input type="radio" name="txtgioitinh" value="2">Nữ
                            </label>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="diachi" value="{{Auth::guard('customer')->user()->address??''}}" class="form-control dttdiachi"></textarea>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" value="{{Auth::guard('customer')->user()->email??''}}" name="email" class="form-control dttemail" placeholder="Email">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" value="{{Auth::guard('customer')->user()->phone??''}}" name="phone" class="form-control dttemail" placeholder="Số điện thoại">
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button class=" btn btn-success capnhat">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection