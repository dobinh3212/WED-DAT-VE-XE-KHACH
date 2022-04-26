<div class="modal fade" id="login">
    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">
        <form method="POST" action="{{ route('login_customer') }}">
                @csrf
                <div class="modal-header" style="background: rgb(0,64,87); color: #FFF; text-align: center;">
                    <h4 class="modal-title">Thông tin Đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <!-- Form đăng nhập  -->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Nhập Email"value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"placeholder="Nhập mật khẩu" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="input-group">
                    <div style="margin-left: -75px;" class="col-md-6" >
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
                    </div>
                    <div style="margin-left: 75px;" class="col-md-6">
                    <a href="#" class="btn btn-link">Quên mật khẩu?</a>
                    </div>
                    <div>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i>
                        <button style="height: 41px;color: #FFF;background: rgb(0,64,87);width: 424px;" type="submit" class="btn btn-primary" style="width: 100%">
                            Đăng nhập
                        </button>
                        </span>
                    </div>
                    <br>
                    <!-- button close -->
                    <button type="button" class="btn btn-danger dongdangnhap" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>