<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ==" crossorigin="anonymous" />

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>

    @yield('third_party_stylesheets')
    @include('admin.layouts.datatables_css')
    @stack('page_css')
    <style>
        .form-group label {
            text-align: left !important
        }
    </style>
</head>

<body style="background-color: #3B5998">
    <div class="container" style="padding-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Xác thực 2 lớp</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        <form role="form" method="post" action="{{ route('two_face.verify') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label" for="otp">
                                    <h6>Yêu cầu nhập mã xác thực</h6>
                                </label>
                                <input type="text" name="code" class="form-control" placeholder="ex: 123456" autocomplete="off" maxlength="6" id="otp">
                            </div>
                            <p class="text-muted">
                                Mở ứng dụng xác thực hai yếu tố trên thiết bị của bạn để xem mã xác thực và xác minh
                                danh tính của bạn.
                            </p>
                            <div class="form-group">
                                <button class="btn btn-success col-md-12">Xác thực danh tính</button>
                            </div>
                            <div class="form-group">
                                {{-- <button class="btn btn-primary col-md-12">Hủy</button> --}}
                                <a href="#" class="btn btn-default col-md-12" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                                    Hủy
                                </a>
                            </div>
                        </form>

                        <form id="logout_form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>