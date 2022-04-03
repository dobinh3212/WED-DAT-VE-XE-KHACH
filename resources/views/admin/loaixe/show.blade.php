@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết bài viết</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-default float-right" href="{{ route('post.index') }}">
                    Trở lại
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content">
    <div class="card">

        <div class="card-body">
            <div class="row">
                @include('admin.post.show_fields')
            </div>
        </div>

    </div>
</div>
@endsection