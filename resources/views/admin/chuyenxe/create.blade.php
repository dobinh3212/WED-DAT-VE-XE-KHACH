@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Thêm thông tin chuyến xe</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'buse.store', 'method' => 'post', 'files' => true]) !!}

        <div class="card-body">

            <div class="row">
                @include('admin.chuyenxe.fields')
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Thêm', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('buse.index') }}" class="btn btn-default">Hủy</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection