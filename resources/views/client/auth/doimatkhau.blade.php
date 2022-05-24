@extends('client.layout.main')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<div>
    <div class="modal-dialog" style="width: 450px;">
        <!-- Đổi mật khẩu-->
        @include('flash::message')
        <form action="{{ url('/change_password') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="background: rgb(0,64,87); color: #FFF; text-align: center;">
                    <button type="button" class="close" style="color: white;opacity: 1;">&times;</button>
                    <h4 class="modal-title">Đổi Mật Khẩu</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon"> <span class="glyphicon glyphicon-briefcase"></span></span>
                        <input type="password" name="password_old" class="form-control mkcu" placeholder="Mật khẩu cũ !">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="password_new" class="form-control mkmoi" placeholder="Mật khẩu mới !">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
                        <input type="password" name="password_new_confirm" class=" form-control remkmoi" placeholder="Xác nhận Mật khẩu !">
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                <button style="background: gainsboro;margin-right: 240px;" type="button" class="btn" onclick="location.href='/return';"><a>Quay lại</a></button>
                    <button class="btn btn-success capnhatmk">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection