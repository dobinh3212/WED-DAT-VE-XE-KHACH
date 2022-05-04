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
        <tr>
            <th>Tuyến</th>
            <th>Giờ Xuất Bến</th>
            <th>Thời Gian Đến</th>
            <th>Loại Xe</th>
            <th>Chổ Ngồi</th>
            <th>Giá</th>
        </tr>
        @foreach($lichsudi as $t)
        <tr class="dongthongtinve" data-id={{ $i }}>
            <td><span>{{$t->Nơi_đi}} -> {{$t->Nơi_đến}}</span></td>
            <td><span>{{$t->Ngày_xuất_phát}} : {{$t->Giờ_xuất_phát}}</span></td>
            <td><span>{{$t->Thời_gian_đến_dự_kiến}}</span></td>
            <td><span>{{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}}</span></td>
            <td><span>{{$t->Vị_trí_ghế}}</span></td>
            <td><span>{{($t->Tiền_vé)/1000}}.000 VNĐ</span></td>
        </tr>
        <?php $i++; ?>
        @endforeach
    </table>
</div>
</div>
@endsection
@section('excontent')
<div id="thongtinve" class="modal fade">
    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">
            <div class="modal-header" style="background: rgb(0,64,87); color: #FFF; text-align: center;">
                <button class="close" data-dismiss="modal" style="color: white;opacity: 1;">&times;</button>
                <h4 class="modal-title">Thông Tin Vé</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Nơi đi: </span>
                    <input id="Noidi" type="text" readonly class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Nơi đến: </span>
                    <input id="Noiden" type="text" readonly class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Thời gian đi: </span>
                    <input id="Thoigiandi" type="text" readonly class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Thời gian đến: </span>
                    <input id="Thoigianden" type="text" readonly class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Loại xe: </span>
                    <input id="Loaixe" type="text" readonly class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Tiền vé: </span>
                    <input id="Tienve" type="text" readonly class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Vị trí: </span>
                    <textarea id="Vitri" type="text" readonly class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection