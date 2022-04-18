@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lộ trình</h1>
            </div>
            @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
            <div class="col-sm-6">
                <a style="margin-left: 440px;margin-top: 30px;" class="btn btn-primary float-right" href="{{ route('route_bus.create') }}">
                    Thêm mới
                </a>
            </div>
            @endif
        </div>
    </div>
</section>

<div class="content">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('admin.lotrinh.table')

            <div class="card-footer clearfix float-right">
                <div class="float-right">
                    @include('adminlte-templates::common.paginate', ['records' => $route_bus])
                </div>
            </div>
        </div>

    </div>
</div>

@endsection