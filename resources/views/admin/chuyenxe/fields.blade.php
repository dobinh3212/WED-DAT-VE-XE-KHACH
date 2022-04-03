<div class="form-group col-sm-9">
<div class="form-group col-sm-12">
        {!! Form::label('route_id', 'Lộ trình') !!}
        {!! Form::select('route_id', $route_id, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('driver_id', 'Tài xế') !!}
        {!! Form::select('driver_id', $driver_id, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('coach_id', 'Xe') !!}
        {!! Form::select('coach_id', $coach_id, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('start_day', 'Ngày khởi hành:') !!}
        {!! Form::text('start_day', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('start_time', 'Thời gian khởi hành:') !!}
        {!! Form::text('start_time', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('price', 'Giá vé:') !!}
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>
</div>

