<div class="col-sm-12">
<div class="col-sm-6 chonvemain">
  <!-- Thông tin chuyến xe -->
  <div style="text-align: center;" class="chonveleft">
    <h3>Thông tin đơn hàng</h3><br>
    <p><i class="fa fa-bus"></i> Mã đơn hàng: <a>    {{ $order_ticket->id }}</a></p>
    <p><i class="fa fa-bus"></i> Lộ trình: <a>{{\App\Models\RouteBus::where(['id' => $order_ticket->route_id->route_id??''])->first()->route??''}}</a></p>
    <p><i class="glyphicon glyphicon-time"></i> Giờ xuất bến: <a>  {{$order_ticket->buse->start_time??''}} :{{date('d-m-Y',strtotime($order_ticket->buse->start_day??''))}}</a></p>
    <p><span class="glyphicon glyphicon-time"></span> Thời gian dự kiến: <a>{{\App\Models\RouteBus::where(['id' => $order_ticket->route_id->route_id??''])->first()->time_intend??''}} tiếng</a></p>
    <p><i class="fa fa-bus"></i> Biển số xe: <a> {{\App\Models\Coach::where(['id' => $order_ticket->buse->coach_id??''])->first()->license_plate??''}}</a></p>
    <p><i class="fa fa-balance-scale"></i> Tổng tiền: <a>{{number_format($order_ticket->total) }} VNĐ</a></p>
    <p><i class="glyphicon glyphicon-bed"></i> Tình trạng: <a>@if ($order_ticket->is_active == 1)
                <td style="color: #47e11a;font-weight: bold;"> {{ 'Đã thanh toán' }}</td>
                @elseif($order_ticket->is_active == 0)
                <td style="color: #da8f08cf;font-weight: bold;"> {{ 'Thất bại' }}</td>
                @else($order_ticket->is_active == 2)
                <td style="color: red;font-weight: bold;"> {{ 'Hoàn trả' }}</td>
                @endif</a></p>
    <p><span class="glyphicon glyphicon-bed"></span> Loại xe: <a>{{($order_ticket->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}}</a></p>
</div>
</div>
<div class="col-sm-6 chonvemain">
  <!-- Thông tin chuyến xe -->
  <div style="text-align: center;" class="chonveleft">
    <h3>Thông tin khách hàng</h3><br>
    <p><i class="fa fa-user"></i> Mã khách hàng: <a>{{ $order_ticket->customer_id }}</a></p>
    <p><i class="fa fa-user"></i> Tên khách hàng: <a>   {{ $order_ticket->customer->name }}</a></p>
    <p><i class="fa fa-phone"></i> Số điện thoại: <a>{{ $order_ticket->customer->phone }}</a></p>
    <p><i class="fa fa-envelope"></i> Email: <a>{{ $order_ticket->customer->email }}</a></p>
</div>
</div>
<div>