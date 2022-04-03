<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">TRANG QUẢN TRỊ</li>
            <li>
                <a href="/admin">
                    <i class="fa fa-calendar"></i> <span>Bảng điều khiển</span>
                </a>
            </li>
            <li><a href="{{route('busstop.index')}}"><i class="fa fa-cubes"></i> <span>QL Trạm dừng</span></a></li>
            <li><a href="{{route('coach.index')}}"><i class="fa fa-bus"></i> <span>QL Xe khách</span></a></li>
            <li><a href="{{route('type_bus.index')}}"><i class="fa fa-database"></i> <span>QL Loại xe</span></a></li>
            <li><a href="{{route('route_bus.index')}}"><i class="fa fa-cube" ></i> <span>QL Lộ trình</span></a></li>
            <li><a href="{{route('buse.index')}}"><i class="fa fa-dashboard" ></i> <span>QL Chuyến xe</span></a></li>
            <li><a href="{{route('news.index')}}"><i class="fa fa-file-text"></i> <span>QL Tin tức</span></a></li>
            <li><a href="{{route('province.index')}}"><i class="fa fa-fire"></i> <span>QL Tỉnh thành</span></a></li>
            <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i> <span>QL Người dùng</span></a></li>
            <li><a href=""><i class="fa fa-cog"></i> <span>Cấu hình Website</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
