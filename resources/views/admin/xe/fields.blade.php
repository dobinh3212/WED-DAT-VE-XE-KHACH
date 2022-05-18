<div class="form-group col-sm-9">
    <div class="form-group col-sm-12">
        {!! Form::label('license_plate', 'Biển số xe:') !!}
        {!! Form::text('license_plate', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('type_car_id', 'Loại xe:') !!}
        {!! Form::select('type_car_id', $loaixe, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('number_seat', 'Số chỗ:') !!}
        {!! Form::text('number_seat', null, ['class' => 'form-control']) !!}
    </div>
    <!-- <div class="form-group col-sm-12">
        {!! Form::label('ngaybaotrigannhat', 'Ngày bảo trì gần nhất:') !!}
        {!! Form::text('ngaybaotrigannhat', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('ngaybaotritieptheo', 'Ngày bảo trì tiếp theo:') !!}
        {!! Form::text('ngaybaotritieptheo', null, ['class' => 'form-control']) !!}
    </div> -->
</div>

