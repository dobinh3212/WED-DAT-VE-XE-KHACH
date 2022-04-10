<div class="form-group col-sm-9">
    <div class="form-group col-sm-12">
        {!! Form::label('title', 'Tiêu đề:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('image', 'Ảnh:') !!}
        {!! Form::text('image', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
    {!! Form::label('image', 'Hình ảnh:') !!}<br>
    <input type="file" class="image-preview" name="image" enctype="multipart/form-data"
        style="border: none" onchange="previewFile(this);">
    @if (isset($news) && $news->image != null && file_exists(public_path() . $news->image))
        <img id="previewImg" src="{{ url('/upload/new/' . $news->image) }}" 
            alt="">
    @else
        <img id="previewImg" src="{{ url('/upload/no_image/image.png') }}" >
    @endif
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('introduce', 'Giới thiệu:') !!}
        {!! Form::text('introduce', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('content', 'Nội dung:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
</div>

