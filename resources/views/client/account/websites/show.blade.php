@extends('client.layout.app')
@section('content_client')
@section('title', 'Chi tiết website')
<div class="section_web website_show">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="menu_account">
                    <ul>
                        <li><a href="/account/website">Tất cả website</a></li>
                        <li><a href="{{ route('edit_website', $website_details_page['id']) }}">Cấu hình nhanh</a></li>
                        <!-- <li><a href="{{ route('edit_website', $website_details_page['id']) }}">Đổi tên miền</a></li> -->
                        <li><a href="{{ $website_details_page['domain'] }}" target="_blank">Truy cập website</a>
                        </li>
                        <li><a href="{{ $website_details_page['domain'] }}/{{ get_setting('tenant_admin_url') }}"
                                target="_blank">Quản trị</a></li>
                        <!-- <li><a href="{{ route('edit_website', $website_details_page['id']) }}">Sao lưu dữ liệu</a></li> -->
                        <li><a href="{{ route('delete_website', $website_details_page['id']) }}">Xóa website</a></li>
                        <li><a href="{{ get_setting('tax_export_request_url') }}" target="_blank">Yêu cầu xuất hóa
                                đơn</a></li>
                        <li><a href="{{ get_setting('docs_guide') }}" target="_blank">Hướng dẫn cấu hình</a></li>

                        <li><a href="{{ route('change_domain', $website_details_page['id']) }}">Đổi tên
                                miền</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <h3 class="h3-title">Chi tiết website #{{ $website_details_page->id }}</h3>
                @if (request()->get('success') > 0)
                    <div class="alert alert-success">
                        <strong>Tạo website thành công!</strong> Quý khách có thể <a
                            href="{{ $website_details_page->domain }}">truy cập website tại đây</a>
                        {{-- hoặc xem <a href="{{ get_setting('docs_guide') }}" target="_blank">Hướng dẫn cấu hình website lần
                        đầu</a> --}}
                    </div>
                @endif
                @if (isset($check_expried->count_back) && $check_expried->count_back <= 7)
                    <div class="alert alert-warning">
                        Website của quý khách sẽ hết hạn trong {{ $check_expried->count_back ?? 8 }} ngày nữa. Sau
                        khi
                        hết hạn, website sẽ bị xóa khỏi hệ thống. Quý khách vui lòng gia hạn để tránh gián đoạn dịch vụ.
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Thông số website
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="132">Tên miền</td>
                                    <td>
                                        <a href="{{ $website_details_page->domain }}">
                                            {{ $website_details_page->domain }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="132">Tài khoản</td>
                                    <td>{{ $website_details_page->user_name }}</td>
                                </tr>
                                <tr>
                                    <td width="132">Mật khẩu</td>
                                    <td>{{ $website_details_page->pass_word }}</td>
                                </tr>
                                <tr>
                                    <td width="132">Gói cước</td>
                                    <td>{{ $website_details_page->package->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td width="132">Trạng thái</td>
                                    <td>{{ $website_details_page->is_expried == 0 ? 'Dùng thử' : ($website_details_page->is_expried == 1 ? 'Đang sử dụng' : 'Hết hạn') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="132">Ngày bắt đầu</td>
                                    <td>{{ date('d/m/Y', strtotime($website_details_page->created_at)) }}</td>
                                </tr>
                                <tr>
                                    <td width="132">Ngày hết hạn</td>
                                    <td>{{ date('d/m/Y', strtotime($check_expried->end_date ?? '-/-')) }} (còn
                                        {{ $check_expried->count_back ?? 8 }} ngày)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </br>
                <div class="card">
                    <div class="card-header">
                        Thông tin gia hạn website
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="132">Chủ tài khoản</td>
                                    <td>{{ get_setting('bank_01_name') }}</td>
                                </tr>
                                <tr>
                                    <td width="132">Số tài khoản</td>
                                    <td>{{ get_setting('bank_01_account') }}</td>
                                </tr>
                                <tr>
                                    <td width="132">Ngân hàng</td>
                                    <td>{{ get_setting('bank_01_bank_name') }}</td>
                                </tr>
                                <tr>
                                    <td width="132">Số tiền</td>
                                    <td>{{ number_format($website_details_page->package->price_years, 0, '.', ',') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="132">Nội dung</td>
                                    <td>{{ auth()->user()->email }} - {{ $website_details_page->id }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
