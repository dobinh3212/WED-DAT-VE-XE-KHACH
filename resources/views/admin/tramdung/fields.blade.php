<div class="form-group col-sm-9">
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Tên trạm dừng:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('position', 'Vị trí trạm dừng:') !!}
        {!! Form::text('position', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group col-sm-12">
        {!! Form::label('user_id_create', 'Tên người tạo:') !!}
        {!! Form::text('user_id_create', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group col-sm-12">
        {!! Form::label('user_id_update', 'Tên người sửa:') !!}
        {!! Form::text('user_id_update', null, ['class' => 'form-control']) !!}
    </div>
</div>

