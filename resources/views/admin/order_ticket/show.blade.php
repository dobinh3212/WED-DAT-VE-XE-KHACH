@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 style="font-size: 30px;">Chi tiết đơn hàng</h1> -->
            </div>
            <div class="col-sm-6">

                <a class="btn btn-default float-right" style="margin: -54px;" href="{{ route('order_ticket.index') }}">
                    Quay
                    lại
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content">
    <div class="card">

        <div class="card-body">
            <div class="row">
                @include('admin.order_ticket.show_fields')
            </div>
        </div>

    </div>
</div>
@endsection