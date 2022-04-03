<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Tên bài viết:') !!}
    {{ $post->name }}
</div>

<div class="col-sm-12">
    {!! Form::label('name', 'Danh mục bài viết:') !!}
    {{ $post->postCategory->name ?? '' }}
</div>

<div class="col-sm-12">
    {!! Form::label('content', 'Nội dung bài viết:') !!}
    {!! $post->content !!}
</div>

<div class="col-sm-12">
    {!! Form::label('content', 'Ảnh:') !!}
    @if($post->image!=null && file_exists(public_path().'/upload/'.$post->image))
    <img src="{{ asset('/upload/' . $post->image) }}" height="200">
    @else
    <img src="https://res.cloudinary.com/vinahouse/image/upload/v1639994621/image_qd8vs9.png" height="200">
    @endif
</div>