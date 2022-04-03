@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Xe khách</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('coach.create') }}">
                    Thêm mới
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('admin.xe.table')

            <div class="card-footer clearfix float-right">
                <div class="float-right">
                    @include('adminlte-templates::common.paginate', ['records' => $xe])
                </div>
            </div>
        </div>

    </div>
</div>

@endsection