@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Sửa thông tin loại xe</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($loaixe, ['route' => ['type_bus.update', $loaixe->id], 'method' => 'patch', 'files' => true]) !!}

        <div class="card-body">
            <div class="row">
                @include('admin.loaixe.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('type_bus.index') }}" class="btn btn-default">Hủy</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection