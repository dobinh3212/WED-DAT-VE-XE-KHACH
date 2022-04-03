@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Sửa thông tin xe</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($xe, ['route' => ['coach.update', $xe->id], 'method' => 'patch', 'files' => true]) !!}

        <div class="card-body">
            <div class="row">
                @include('admin.xe.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('coach.index') }}" class="btn btn-default">Hủy</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection