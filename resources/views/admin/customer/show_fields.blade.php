<div class="col-sm-12">
    {!! Form::label('name', 'Họ và tên:') !!}
    {{ $customers->name }}
</div>

<div class="col-sm-12">
    {!! Form::label('email', 'Địa chỉ email:') !!}
    {{ $customers->email }}
</div>

<div class="col-sm-12">
    {!! Form::label('phone', 'Điện thoại:') !!}
    {{ $customers->phone }}
</div>
<div class="col-sm-12">
    {!! Form::label('created_at', 'Ngày tạo:') !!}
    {{ $customers->created_at }}
</div>
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Ngày sửa:') !!}
    {{ $customers->updated_at }}
</div>

<div class="col-sm-12">
    {!! Form::label('image', 'Ảnh đại diện:') !!}



    @if ($customers->image != null && file_exists($file_name))
        <img src="{{ asset('/avatar/' . $users->image) }}" height="200" width="auto">
    @else
        <img src="https://tse3.mm.bing.net/th?id=OIP.yQQfPxRKgHhquAWlnbYciQHaHx&pid=Api&P=0&w=300&h=300" height="50"
            width="auto">
    @endif

</div>
