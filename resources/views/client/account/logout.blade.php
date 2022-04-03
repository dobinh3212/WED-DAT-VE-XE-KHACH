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
                <h3 class="h3-title">Đăng xuất</h3>
                @include('flash::message')
                @include('adminlte-templates::common.errors')
                <div class=" row">
                    <div class="col-sm-6 col-xs-12">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
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
