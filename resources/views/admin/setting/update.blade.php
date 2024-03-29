@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <h1>
        Thông tin cấu hình website
    </h1>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <!-- -->
                {!! Form::model($setting, ['route' => ['setting.update', $setting->id], 'method' => 'patch', 'files' => true]) !!}
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Công Ty</label>
                        <input value="{{ $setting->company }}" type="text" class="form-control" id="company" name="company" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <input type="file" id="new_image" name="new_image"><br>
                        @if ($setting->image)
                        <img src="{{asset("/upload/setting/$setting->image")}}" width="200">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ 1</label>
                        <input value="{{ $setting->address }}" type="text" class="form-control" id="address" name="address" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ 2</label>
                        <input value="{{ $setting->address2 }}" type="text" class="form-control" id="address2" name="address2" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SĐT</label>
                        <input value="{{ $setting->phone }}" type="text" class="form-control" id="phone" name="phone" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hotline</label>
                        <input value="{{ $setting->hotline }}" type="text" class="form-control" id="hotline" name="hotline" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">MST</label>
                        <input value="{{ $setting->tax }}" type="text" class="form-control" id="tax" name="tax" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input value="{{ $setting->facebook }}" type="text" class="form-control" id="facebook" name="facebook" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input value="{{ $setting->email }}" type="text" class="form-control" id="email" name="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Link bài viết giới thiệu</label>
                        <input value="{{ $setting->introduce }}" type="text" class="form-control" id="introduce" name="introduce" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bản Tin</label>
                        <textarea class="form-control" type="text" id="summary" name="summary" rows="4" cols="50">{{ $setting->summary }}</textarea>
                    </div>
                </div>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
                @endif
                </form>
            </div>
            <!-- /.box -->


        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
@endsection