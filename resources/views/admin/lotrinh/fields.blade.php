<div class="form-group col-sm-9">
    <div class="form-group col-sm-12">
        {!! Form::label('departure', 'Điểm xuất phát:') !!}
        {!! Form::select('departure', $province,null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('destination', 'Điểm cuối cùng:') !!}
        {!! Form::select('destination', $province, null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('rest_stops', 'Điểm dừng:') !!}
        {!! Form::select('rest_stops', $rest_stop, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('time_intend', 'Thời gian khởi hành:') !!}
        {!! Form::text('time_intend', null, ['class' => 'form-control']) !!}
    </div>
</div>

