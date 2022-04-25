<div class="modal fade" id="login">
    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">
            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <div style="padding-bottom: 5px">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tên đăng nhập')
                                    }}</label>
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu')
                                    }}</label>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex">
                    <div class="col-md-6" style="margin-left: 165px;">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Nhớ mật khẩu') }}
                        </label>
                    </div>
                    <div class="col-md-4" style="margin-left: -46px;margin-top: -7px;">
                        <a class="nav-link" href="{{ url('/forgot_password') }}"> {{ __('Quên mật khẩu?') }}</a>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" style="width: 100%">
                            {{ __('Đăng nhập') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>