@extends('client.layout.main')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<!-- Lịch sử chuyến đi -->
<div class="lichsudi">
    <?php $i = 0; ?>
    <div class="tenthongtinkhach">
        <h3>Lịch Sử Đã Đặt</h3>
    </div>
    <table>
        @include('flash::message')
        <tr>
            <th>Mã Vé</th>
            <th>Tuyến</th>
            <th>Giờ Xuất Bến</th>
            <th>Thời Gian Dự Kiến</th>
            <th>Loại Xe</th>
            <th>Số Vé</th>
            <th>Giá</th>
            <th>Tình Trạng</th>
            <th>Thao tác</th>
        </tr>
        @foreach($order_ticket as $t)
        <tr class="dongthongtinve" data-id={{ $i }}>
            <td><span>{{$t->id??''}}</span></td>
            <td><span>{{\App\Models\RouteBus::where(['id' => $t->route_id->route_id??''])->first()->route??''}}</span></td>
            <td><span>{{$t->buse->start_time??''}} :{{date('d-m-Y',strtotime($t->buse->start_day??''))}} </span></td>
            <td><span>{{\App\Models\RouteBus::where(['id' => $t->route_id->route_id??''])->first()->time_intend??''}} tiếng</span></td>
            <td><span>{{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}}</span></td>
            <td><span>{{$t->number??''}}vé</span></td>
            <td><span>{{($t->total)/1000}}.000 VNĐ</span></td>
            <td><span>@if ($t->is_active == 1) {{ 'Thành công' }}
                    @elseif($t->is_active == 0) {{ 'Thất bại' }}
                    @else{{ 'Đã hoàn trả' }}
                    @endif
                </span></td>
            <td style="text-align: center;" width="120">
                <div class='btn-group'>
                    <a href="{{ route('detail_ticket', [$t->id]) }}" class='btn btn-default btn-xs'>
                        Chi tiết
                    </a>
                </div>
                @if($t->is_active == 1)
                <div class='btn-group'>
                    <a href="{{ route('hoantien', [$t->id]) }}" class='btn btn-success btn-xs'>
                        <i class="far fa-trash-alt"></i> Hoàn
                    </a>
                </div>
                @else
                <div class='btn-group'>
                    <a href="{{ route('delete_ticket', [$t->id]) }}" class='btn btn-danger btn-xs'>
                        <i class="far fa-trash-alt"></i> Xóa
                    </a>
                </div>
                @endif
            </td>
        </tr>
        <?php $i++; ?>
        @endforeach
    </table>
</div>
</div>
@endsection