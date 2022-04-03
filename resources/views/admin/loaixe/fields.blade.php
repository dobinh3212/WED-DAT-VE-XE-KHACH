<div class="form-group col-sm-9">
    <div class="form-group col-sm-12">
        {!! Form::label('type_bus', 'Loại xe:') !!}
        {!! Form::text('type_bus', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('type_seat', 'Loại ghế:') !!}
        {!! Form::text('type_seat', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('seats', 'Số ghế:') !!}
        {!! Form::text('seats', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('number_row', 'Số hàng:') !!}
        {!! Form::text('number_row', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('number_columns', 'Số cột:') !!}
        {!! Form::text('number_columns', null, ['class' => 'form-control']) !!}
    </div>
</div>

