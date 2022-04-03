<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Đ</b>VXK</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">ĐẶT VÉ XE KHÁCH</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">
                            @if(Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Menu Footer-->
                        <li class="">
                            <!-- <a href="#" class="dropdown-item">Tài khoản cá nhân</a> -->
                            {{-- <a href="/generator_builder" class="dropdown-item">Generator Builder</a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('change_password') }}"class="dropdown-item">Đổi mật khẩu</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ Auth::user()->secret_code == null ? '/admin/two_face_auths' : '/admin/two_face_auths/disable' }}" class="dropdown-item">{{ Auth::user()->secret_code == null ? 'Bật' : 'Tắt' }} xác
                                thực 2
                                lớp</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('login') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
