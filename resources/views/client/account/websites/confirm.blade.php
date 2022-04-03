@extends('client.layout.app')
@section('content_client')
@section('title', 'Xác nhận hoàn thành')
<div class="section_web website_list">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('client.layout.steps')
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <h3 class="h3-title">Thông tin đăng ký website</h3>
                        <form action="{{ route('store_website') }}" method="POST" id="form-create">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Tên giao diện</label>
                                <div class="col-md-8">
                                    <input id="themes" class="d-none" type="text" name="theme_id"
                                        value="{{ request()->get('theme_id') }}">
                                    <input id="theme" disabled type="text"
                                        class="form-control @error('theme_id') is-invalid @enderror" name="theme"
                                        value="{{ get_name_themes(request()->get('theme_id')) }}" required
                                        autocomplete="email" autofocus>
                                    @error('theme_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Gói website</label>
                                <div class="col-md-8">
                                    <input id="packages" class="d-none" type="text" name="pack_id"
                                        value="{{ request()->get('pack_id') }}">
                                    <input id="package" disabled type="email"
                                        class="form-control @error('pack_id') is-invalid @enderror" name="pack"
                                        value="{{ get_name_package(request()->get('pack_id')) }}" required
                                        autocomplete="email" autofocus>
                                    @error('pack_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Tên miền</label>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <input type="text" name="domain"
                                            class="form-control @error('domain') is-invalid @enderror"
                                            placeholder="Tên miền có thể thay đổi sau này."
                                            aria-label="Tên miền tạm thời. Viết liền không dấu"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">{{ get_setting('register_domain') }}</span>
                                        </div>
                                        @error('domain')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <input id="theme_color" class="d-none" type="text" name="theme_color"
                                    value="{{ request()->get('theme_color') }}">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btn-submit-create">
                                        Tạo website
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#form-create").submit(function(e) {
            $("#btn-submit-create").attr("disabled", "disabled");
            $("#btn-submit-create").html("Đang tạo website. Vui lòng liên nhẫn.");
            return true;
        });
    });
</script>
@endsection
