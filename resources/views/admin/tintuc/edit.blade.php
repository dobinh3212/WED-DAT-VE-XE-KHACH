@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Sửa tin tức</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($news, ['route' => ['news.update', $news->id], 'method' => 'patch', 'files' => true]) !!}

        <div class="card-body">
            <div class="row">
                @include('admin.tintuc.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('news.index') }}" class="btn btn-default">Hủy</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection