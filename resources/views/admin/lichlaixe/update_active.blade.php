@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Cập nhật trạng thái</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($buse, ['route' => ['update_active2', $buse->id], 'method' => 'Post', 'files' => true]) !!}

        <div class="card-body">
            <div class="row">
                @include('admin.lichlaixe.field_active')
            </div>
        </div>

        <div style="margin-left:15px" class="card-footer">
            {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('lichtaixe') }}" class="btn btn-default">Hủy</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection