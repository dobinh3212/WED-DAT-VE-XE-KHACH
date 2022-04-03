@extends('client.layout.app')
@section('content_client')
@section('title', 'Xóa website')
<div class="section_web website_list">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <div class=" row">
                    <div class="col-sm-12 col-xs-12">
                        </br>
                        {!! Form::open(['route' => ['delete_website', ['id' => $website_details_page->id]], 'menthod' => 'post']) !!}
                        <h5>Bạn có chắc chắn muốn xóa website {{ clearHTTP($website_details_page->domain) }} ?</h5>
                        <div class="form-group">
                            <label for="domain" style="margin-bottom: 15px;">Bạn không thể hoàn tác hành động này. Thao tác sẽ xóa vĩnh viễn
                                website của bạn. <br> Vui lòng gõ lại tên miền
                                <b>{{ clearHTTP($website_details_page->domain) }}</b> để
                                xác nhận.</label>
                            <input type="text" class="form-control" name="domain" id="domain " value="" aria-describedby="domain " placeholder="Nhập tên miền">
                        </div>
                        @include('flash::message')
                        <button type="submit" class="btn btn-danger" style="width:100%">Tôi hiểu về hậu quả và đồng ý
                            xóa website này</button>
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