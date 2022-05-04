@extends('client.layout.main')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<!-- Hiển thị thông tin khách -->
<div class="thongtinkhach1">
    @include('flash::message')
    <div style="margin-left: 393px;" class="mainthongtinkhach">
        <div class="tenthongtinkhach">
            <h3>THÔNG TIN CÁ NHÂN</h3>
        </div>
        <table style="margin: 1em; margin-left: 4em;">
            <tr>
                <td><strong>Số điện thoại: </strong></td>
                <td>{{Auth::guard('customer')->user()->phone??'Thông tin chưa cập nhật!'}}</td>
            </tr>
            <tr>
                <td><strong>Tên: </strong></td>
                <td class="tenkh">{{Auth::guard('customer')->user()->name??'Thông tin chưa cập nhật!'}}</td>
            </tr>
            <tr>
                <td><strong>Ngày sinh: </strong></td>
                <td class="ngaysinhkh">{{date('d-m-Y',strtotime(Auth::guard('customer')->user()->date_birth??'Thông tin chưa cập nhật!'))}}</td>
            </tr>
            <tr>
                <td><strong>Địa chỉ: </strong></td>
                <td class="diachikh">{{Auth::guard('customer')->user()->address??'Thông tin chưa cập nhật !'}}</td>
            </tr>
            <tr>
                <td><strong>Email: </strong></td>
                <td class="emailkh">{{Auth::guard('customer')->user()->email??'Thông tin chưa cập nhật !'}}</td>
            </tr>
            <tr style="border: none;">
                <!-- button đổi thông tin -->
                <td><button type="button" class="btn btn btn-warning btn-lg buttondoithongtin" onclick="location.href='{{url("update_profile")}}';">Đổi thông tin</button></td>
                <!-- button đổi mật khẩu -->
                <td><button class="btn btn btn-warning btn-lg buttondoimatkhau" onclick="location.href='{{url("update_password")}}';">Đổi mật khẩu</button></td>
            </tr>
        </table>
    </div>
</div>
@endsection