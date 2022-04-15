@extends('client.layout.main')
@section('title')
Chuyến xe
@endsection
@section('content')
<!-- phần bước -->
<div class="buoc">
    <ul>
        <li onclick="vetrangtruoc()" class="tay">Tìm Chuyến</li>
        <li class="stay tay">Chọn Chuyến</li>
        <li>Chi Tiết Vé</li>
        <li>Thanh toán</li>
    </ul>
</div>
<!-- kết thức phần bước -->
<!-- Phần chuyến xe  -->
<div class="chuyenxemain">
    @if(!empty($chuyenxe) && count($chuyenxe)!=0)
    <table>
        <tr>
            <th>Mã chuyến</th>
            <th>Tuyến</th>
            <th>Giờ Xuất Bến</th>
            <th>Thời Gian đi dự kiến</th>
            <th>Loại Xe</th>
            <th>Giá</th>
            <th>Đặt Mua</th>
        </tr>
        @foreach($chuyenxe as $t)
        <tr>
            <td>{{$t->id}}</td>
            <td><span>{{$t->lotrinh->route}}</span></td>
            <td><span>{{$t->start_time}} : {{date('d-m-Y',strtotime($t->start_day))}} </span></td>
            <td><span>{{$t->lotrinh->time_intend}} tiếng</span></td>
            <td><span>{{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}}</span></td>
            <td><span>{{($t->price)/1000}}.000 VNĐ</span></td>
            <td>
                <div class="chuyenxetim">
                    <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                    <button type="button" class="btn" onclick="location.href='{{url("chonve")}}/{{$id=$t->id}}';"><a>Đặt vé</a></button>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
    @if(count($chuyenxe)==0)
    <br>
    <i>
        <h4 style="color: red;font-weight: bold;text-align: center;width: 70%; margin: auto; margin-top: 2em;"> Không Tìm Thấy Chuyến Xe Nào Theo Yêu Cầu Của Bạn, Vui Lòng Tìm Chuyến Xe Khác, Cảm Ơn!</h4>
    </i>
    <br>
    <br>
    @endif
    @if(!empty($chuyenxes)&&count($chuyenxes)!=0)
    <table>
        <div style="color: #020a62;margin-left: 75px;font-weight: bold;font-size: 20px;"> <i class="fa fa-bus"></i> Chuyến xe sắp tới:</div>
        <tr>
            <th>Mã chuyến</th>
            <th>Tuyến</th>
            <th>Giờ Xuất Bến</th>
            <th>Thời Gian đi dự kiến</th>
            <th>Loại Xe</th>
            <th>Giá</th>
            <th>Số chỗ còn trống</th>
            <th>Đặt Mua</th>
        </tr>
        @foreach($chuyenxes as $t)
        <tr>
            <td>{{$t->id}}</td>
            <td><span>{{$t->lotrinh->route}}</span></td>
            <td><span>{{$t->start_time}} : {{date('d-m-Y',strtotime($t->start_day))}} </span></td>
            <td><span>{{$t->lotrinh->time_intend}} tiếng</span></td>
            <td><span>{{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}}</span></td>
            <td><span>{{($t->price)/1000}}.000 VNĐ</span></td>
            <td><span>Còn {{($t->number_seat)}} chỗ</span></td>
            <td>
                <div class="chuyenxetim">
                    <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                    <button type="button" class="btn" onclick="location.href='{{url("chonve")}}/{{$id=$t->id}}';"><a>Đặt vé</a></button>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</div>
<!-- Kết thúc phần chuyến xe  -->
@endsection
@section('script')
<script type="text/javascript">
    function vetrangtruoc() {
        history.back();
    }
</script>
@endsection