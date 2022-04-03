@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết người dùng</h1>
            </div>
            <div class="col-sm-6">

                <a class="btn btn-default float-right" style="margin: 5px" href="{{ route('users.index') }}">
                    Quay
                    lại
                </a>
                <a class="btn btn-default float-right" style="margin: 5px" href="{{route('change_password',$users->id)}}">
                    Đổi mật khẩu
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content">
    <div class="card">

        <div class="card-body">
            <div class="row">
                @include('admin.users.show_fields')
            </div>
        </div>

    </div>
</div>
@endsection