<div class="form-group col-sm-6">
    {!! Form::label('name', 'Họ và tên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('type_employee', 'Loại nhân viên:') !!}
    {!! Form::select('type_employee', ['1' => 'Quản trị viên', '0' => 'Tài xế','2' => 'SupperAdmin'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('sex', 'Giới tính:') !!}
    {!! Form::text('sex', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Địa chỉ:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('license', 'Bằng lái:') !!}
    {!! Form::text('license', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mật khẩu:') !!}
    <input type="password" id="password" name="password" class="form-control">
</div>