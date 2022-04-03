@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    @include('flash::message')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>['update_password'],'menthod'=>'post']) !!}
                    @csrf
                    <div class="form-group row">
                        <label for="oldPassword" class="col-md-3 col-form-label">{{ __('Mật khẩu cũ') }}</label>

                        <div class="col-md-6">
                            <input id="oldPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="oldPassword" required placeholder="Nhập mật khẩu cũ" autocomplete="old-password" value="{{ old('oldPassword') }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newPassword" class="col-md-3 col-form-label">{{ __('Mật khẩu mới') }}</label>

                        <div class="col-md-6">
                            <input id="newPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="newPassword" required placeholder="Nhập mật khẩu mới" autocomplete="new-password" value="{{ old('newPassword') }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newPasswordConfirm" class="col-md-3 col-form-label">{{ __('Nhập lại mật khẩu mới')
                            }} </label>

                        <div class="col-md-6">
                            <input id="newPasswordConfirm" type="password" class="form-control" name="newPasswordConfirm" required placeholder="Nhập lại mật khẩu mới" autocomplete="new-password" value="{{ old('newPasswordConfirm') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Cập nhật') }}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection