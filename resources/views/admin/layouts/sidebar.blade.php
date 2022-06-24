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
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">TRANG QUẢN TRỊ</li>
            <li><a href="{{route('thongke')}}"><i class="fa fa-calendar"></i> <span>Bảng điều khiển</span></a></li>
            @if( Auth::user()->type_employee == 0)
            <li><a href="{{route('lichtaixe')}}"><i class="fa fa-file-text"></i> <span>Lịch tài xế</span></a></li>
            @endif
            <li><a href="{{route('busstop.index')}}"><i class="fa fa-cubes"></i> <span>QL Trạm dừng</span></a></li>
            <li><a href="{{route('coach.index')}}"><i class="fa fa-bus"></i> <span>QL Xe khách</span></a></li>
            <li><a href="{{route('type_bus.index')}}"><i class="fa fa-database"></i> <span>QL Loại xe</span></a></li>
            <li><a href="{{route('route_bus.index')}}"><i class="fa fa-cube"></i> <span>QL Lộ trình</span></a></li>
            <li><a href="{{route('buse.index')}}"><i class="fa fa-dashboard"></i> <span>QL Chuyến xe</span></a></li>
            <li><a href="{{route('news.index')}}"><i class="fa fa-file-text"></i> <span>QL Tin tức</span></a></li>
            <li><a href="{{route('province.index')}}"><i class="fa fa-fire"></i> <span>QL Tỉnh thành</span></a></li>
            <li><a href="{{route('order_ticket.index')}}"><i class="fa fa-file-text"></i> <span>QL Đơn hàng</span></a></li>
            <li><a href="{{route('contact.index')}}"><i class="fa fa-file-text"></i> <span>QL Liên hệ</span></a></li>
            <li><a href="{{route('customer.index')}}"><i class="fa fa-user"></i> <span>QL Khách hàng</span></a></li>
            <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i> <span>QL Người dùng</span></a></li>
            <li><a href="{{route('setting.index')}}"><i class="fa fa-cog"></i> <span>Cấu hình Website</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>