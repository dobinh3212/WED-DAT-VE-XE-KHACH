<div class="col-sm-12">
    {!! Form::label('name', 'Họ và tên:') !!}
    {{ $users->name }}
</div>

<div class="col-sm-12">
    {!! Form::label('email', 'Địa chỉ email:') !!}
    {{ $users->email }}
</div>

<div class="col-sm-12">
    {!! Form::label('phone', 'Điện thoại:') !!}
    {{ $users->phone }}
</div>

<div class="col-sm-12">
    {!! Form::label('is_active', 'Trạng thái:') !!}
    {{ $users->is_active == 1 ? 'Hoạt động' : 'Tạm dừng' }}
</div>

<div class="col-sm-12">
    {!! Form::label('created_at', 'Ngày tạo:') !!}
    {{ $users->created_at }}
</div>
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Ngày sửa:') !!}
    {{ $users->updated_at }}
</div>

<div class="col-sm-12">
    {!! Form::label('image', 'Ảnh đại diện:') !!}



    @if ($users->image != null && file_exists($file_name))
        <img src="{{ asset('/avatar/' . $users->image) }}" height="200" width="auto">
    @else
        <img src="https://tse3.mm.bing.net/th?id=OIP.yQQfPxRKgHhquAWlnbYciQHaHx&pid=Api&P=0&w=300&h=300" height="200"
            width="auto">
    @endif

</div>
