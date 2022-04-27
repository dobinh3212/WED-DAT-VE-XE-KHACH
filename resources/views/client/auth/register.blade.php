
<div class="modal fade" id="register">
    <div class="modal-dialog" style="width:500px;">
        <div class="modal-content">
        <form method="POST" action="{{ route('reigster_client') }}">
                @csrf
                <div class="modal-header"  style="background: rgb(0,64,87); color: #FFF; text-align: center;">
                    <h4 class="modal-title">Thông tin Đăng ký</h4>
                </div>
                <div class="modal-body">
                    <!-- form đăng ký -->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"placeholder="Nhập số điện thoại" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <!-- Họ và tên  -->
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control txtname" name="name"  placeholder="Họ và tên">
                     </div>
                     <br>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"placeholder="Nhập Email" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                     <!-- Ngày sinh  -->
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-hourglass"></span></span>
                        <input type="date" class="form-control txtngaysinh" value="1994-02-20" name="date_birth">
                     </div>
                     <br>
                     <!--  Giới tính-->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-transgender-alt"></i></span>
                         <label class="checkbox-inline">
                                <input type="radio" name="sex" value="1" checked>Nam
                        </label>
                        <label class="checkbox-inline">
                        <input type="radio" name="sex" value="2">Nữ
                        </label>
                    </div>
                     <br>
                     <!--  mật khẩu -->
                     
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu"  required autocomplete="new-password">
                    </div>

                </div>
                <div class="modal-footer">
                <div>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i>
                        <button style="height: 41px;color: #FFF;background: rgb(0,64,87);width: 424px;" type="submit" class="btn btn-primary" style="width: 100%">
                            Đăng ký
                        </button>
                        </span>
                    </div>
                    <br>
                    <!-- đã có tài khoản -->
                    <a href="javascript:void(0)" data-dismiss="modal" onclick="$(body).css('padding-right','0');" data-toggle="modal" data-target="#login" class="btn btn-link">Đã Có Tài Khoản?</a>
                    <!-- button close  -->
                    <button type="button" class="btn btn-danger dongdangky" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- @section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".dangky").click(function(){
                alert("tedsadsadts");
            });
        });
    </script>
@endsection -->