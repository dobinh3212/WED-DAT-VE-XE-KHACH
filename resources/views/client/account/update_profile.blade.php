@extends('client.layout.app')
@section('content_client')
@section('title', 'Sửa tài khoản')
<div class="section_web">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('client.account.menu')
            </div>
            <div class="col-sm-9">
                <h3 class="h3-title">Sửa thông tin tài khoản</h3>
                @include('flash::message')
                @include('adminlte-templates::common.errors')
                <div class=" row">
                    <div class="col-sm-6 col-xs-12">
                        <form action="{{ url('/account/change_profile') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName">Họ và tên</label>
                                <input type="text" class="form-control" name="name" id="change_Name" value="{{auth()->user()->name}}" aria-describedby="nameHelp" placeholder="Nhập họ và tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="change_Phone" value="{{auth()->user()->phone}}" aria-describedby="phoneHelp" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="change_Email" value="{{auth()->user()->email}}" aria-describedby="emailHelp" placeholder="Nhập email">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
