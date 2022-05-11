@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Sửa thông tin khách hàng</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($customers, ['route' => ['customer.update', $customers->id], 'method' => 'patch', 'files' => true ]) !!}

        <div class="card-body">
            <div class="row">
                @include('admin.customer.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('customer.index') }}" class="btn btn-default">Quay lại</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection