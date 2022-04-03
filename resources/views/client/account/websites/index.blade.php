@extends('client.layout.app')
@section('content_client')
@section('title', 'Danh sách website của bạn')
<div class="section_web website_list">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('client.account.menu')
            </div>
            <div class="col-sm-9">
                <h3 class="h3-title">Website của bạn</h3>
                @if (request()->get('limit') > 0)
                <div class="alert alert-danger">
                    <strong>Đăng ký thất bại!</strong></br> {{ get_setting('limit_trial_website_msg') }}
                </div>
                @endif
                @include('flash::message')
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên miền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $stt = 1;
                        @endphp
                        @foreach (get_domain() as $domain)
                        <div class="col-sm-12">
                            <tr>
                                <th scope="row">{{ $stt++ }}</th>
                                <td>{{ $domain->domain }}</td>
                                <td>@if($domain->is_expried == 0) {{ 'Dùng thử' }} @elseif($domain->is_expried == 1)
                                    {{ 'Đang sử dụng' }} @else {{ 'Hết hạn' }} @endif
                                </td>
                                <td>
                                    <a href="{{ route('detail_website', $domain['id']) }}">
                                        <button type="button" class="btn btn-primary btn-sm">Chi tiết</button>
                                    </a>
                                    <a href="{{ $domain['domain']}}" target="_blank">
                                        <button type="button" class="btn btn-primary btn-sm">Truy cập</button>
                                    </a>
                                </td>
                            </tr>
                        </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-sm-12">
                    @if (count(get_domain()) == 0)
                    <a href="/template">
                        <button type="button" class="btn btn-primary btn-sm">Bạn chưa có website. Nhấn vào đây để tạo mới.</button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection