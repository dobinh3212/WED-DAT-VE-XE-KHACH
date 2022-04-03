@extends('client.layout.app')
@section('content_client')
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
                    <div class=" row">
                        <div class="col-sm-12 col-xs-12">
                            </br>
                            {!! Form::open(['route' => ['change_domain', ['id' => $website_details_page->id]], 'menthod' => 'post']) !!}
                            <h5>Bạn có chắc chắn muốn đổi tên miền {{ clearHTTP($website_details_page->domain) }} ?</h5>
                            <div class="form-group">
                                <label for="domain" style="margin-bottom: 15px;">Vui lòng nhập tên miền muốn
                                    đổi.</label><br>
                                @error('domain')
                                    <span style="color: red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="domain" id="domain " value=""
                                        aria-describedby="domain " placeholder="Nhập tên miền">
                                    <div class="input-group-append">
                                        <span class="input-group-text"
                                            id="basic-addon2">{{ get_setting('main_url') }}</span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger" style="width:100%">Xác nhận</button>
                            {!! Form::close() !!}
                            </br>
                            </br>
                            </br>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
