@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Thêm tin tức</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'news.store', 'method' => 'post', 'files' => true]) !!}

        <div class="card-body">

            <div class="row">
                @include('admin.tintuc.fields')
            </div>

        </div>

        <div style="margin-left: 17px;" class=" card-footer">
            {!! Form::submit('Thêm', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('news.index') }}" class="btn btn-default">Hủy</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection