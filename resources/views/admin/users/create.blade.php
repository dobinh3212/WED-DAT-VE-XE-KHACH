@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Thêm mới</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'users.store', 'method' => 'post', 'files' => true ]) !!}

        <div class="card-body">

            <div class="row">
                @include('admin.users.fields')
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('users.index') }}" class="btn btn-default">Quay lại</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection