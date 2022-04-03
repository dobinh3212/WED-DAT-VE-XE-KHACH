@extends('client.layout.app')
@section('content_client')
@section('title', 'Sửa website')
<div class="section_web website_list">
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
                <h3 class="h3-title">Cập nhật website</h3>
                @include('flash::message')
                <div class=" row">
                    <div class="col-sm-6 col-xs-6" style="width:700px">

                        {!! Form::open(['route' => ['update_website', ['id' => $id]], 'menthod' => 'post']) !!}
                        <div class="form-group">
                            <label for="blogname ">Tên website</label>
                            <input type="text" class="form-control" name="blogname" id="blogname "
                                value="{{ $blogname }}" aria-describedby="blogname "
                                placeholder="Nhập tên website">
                        </div>
                        <div class="form-group">
                            <label for="blogdescription ">Slogan</label>
                            <input type="text" class="form-control" name="blogdescription" id="blogdescription"
                                value="{{ $blogdescription }}" aria-describedby="blogdescription "
                                placeholder="Nhập khẩu hiệu">
                        </div>
                        <div class="form-group">
                            <label for="company_phone">Hotline</label>
                            <input type="number" class="form-control" name="company_phone" id="company_phone"
                                value="{{ $company_phone }}" aria-describedby="company_phone"
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="company_email">Email</label>
                            <input type="email" class="form-control" name="company_email" id="company_email"
                                value="{{ $company_email }}" aria-describedby="company_email"
                                placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="form-group">
                            <label for="company_address">Địa chỉ</label>
                            <input type="text" class="form-control" name="company_address" id="company_address"
                                value="{{ $company_address }}" aria-describedby="company_address"
                                placeholder="Nhập địa chỉ">
                        </div>
                        <!-- <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="text" class="form-control" id="logo" aria-describedby="logo" placeholder="Nhập logo">
                        </div> -->
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
