<div class="form-group col-sm-9">
    <div class="form-group col-sm-12">
        {!! Form::label('title', 'Tiêu đề:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('image', 'Hình ảnh:') !!}<br>
        <input type="file" class="image-preview" name="image" enctype="multipart/form-data" style="border: none" onchange="previewFile(this);">
        @if (isset($news) && $news->image != null)
        <img src="{{asset("/upload/$news->image")}}" width="150">
        @else
        <img src="{{asset("/image/no_image.png")}}" width="100">
        @endif
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('introduce', 'Giới thiệu:') !!}
        {!! Form::text('introduce', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        <div style="margin-left: -14px;" class="form-group col-sm-12 p-0">
            {!! Form::label('content', 'Nội dung') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            <script src={{ url('ckeditor/ckeditor.js') }}></script>
            <script type="text/javascript">
                CKEDITOR.replace("content", {
                    language: 'vi',
                    height: ['495px']
                });
            </script>
        </div>
    </div>

</div>