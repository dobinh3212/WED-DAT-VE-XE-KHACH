<div class="form-group col-sm-9">
    <div class="form-group col-sm-12">
        {!! Form::label('departure', 'Điểm xuất phát:') !!}
        {!! Form::select('departure', $province,null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('destination', 'Điểm cuối cùng:') !!}
        {!! Form::select('destination', $province, null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('rest_stops', 'Điểm dừng:') !!}
        {!! Form::select('rest_stops', $rest_stop, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('km', 'Quãng đường (ki-lo-met):') !!}
        {!! Form::number('km', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('time_intend', 'Thời gian khởi hành (giờ):') !!}
        {!! Form::text('time_intend', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12 ">
        {!! Form::label('hot', 'Phổ biến:') !!}
        <input type="checkbox" name="hot" value="1"> Có
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('image', 'Hình ảnh:') !!}<br>
        <input type="file" class="image-preview" name="image" enctype="multipart/form-data" style="border: none" onchange="previewFile(this);">
        @if (isset($news) && $news->image != null && file_exists(public_path() . $news->image))
        <img id="previewImg" src="{{ url('/image/' . $news->image) }}" alt="">
        @else
        <img id="previewImg" src="{{ url('/upload/no_image/image.png') }}">
        @endif
    </div>
</div>