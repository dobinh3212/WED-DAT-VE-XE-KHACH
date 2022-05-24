@extends('client.layout.app')
@section('content_client')
@section('title', 'Đổi mật khẩu')
<div class="section_web">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('client.account.menu')
            </div>
            <div class="col-sm-9">
                <h3 class="h3-title">Đổi mật khẩu</h3>
                @include('flash::message')
                @include('adminlte-templates::common.errors')
                <div class=" row">
                    <div class="col-sm-6 col-xs-12">
                        <form action="{{ url('/account/change_password') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu cũ</label>
                                <input type="password" class="form-control" name="password_old" id="password_old"
                                    value="{{ old('password_old') }}" aria-describedby="emailHelp"
                                    placeholder="Nhập mật khẩu cũ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="password_new" id="password_new"
                                    value="{{ old('password_new') }}" aria-describedby="emailHelp"
                                    placeholder="Nhập mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="password_new_confirm"
                                    value="{{ old('password_new_confirm') }}" id="password_new_confirm"
                                    aria-describedby="emailHelp" placeholder="Xác nhận mật khẩu mới">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection