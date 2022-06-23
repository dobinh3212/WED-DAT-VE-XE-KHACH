<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>ID</th>
                <th>Thời gian xuất phát</th>
                <th>Ngày xuất phát</th>
                <th>Biển số xe</th>
                <th>Lộ trình</th>
                <th>Xe</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($lichtaixes as $lichtaixe)
            <tr>
                <td style="text-align: center;">{{$lichtaixe->id}}</td>
                <td style="text-align: center;">{{$lichtaixe->start_time}}</td>
                <td style="text-align: center;font-weight: 700;">{{date('d-m-Y',strtotime($lichtaixe->start_day))}}</td>
                <td>{{ $lichtaixe->xe->license_plate}}</td>
                <td>{{ $lichtaixe->lotrinh->route??''}}</td>
                <td>{{$lichtaixe->xe->license_plate??''}}</td>
                @if ($lichtaixe->is_active == 1)
                <td class="btn-group" style="color: red;font-weight: bold;">{{ 'Đang chờ' }}
                    @elseif($lichtaixe->is_active == 2)
                <td class="btn-group" style="color: #150ce9;font-weight: bold;">{{ 'Đang chạy' }}
                    @else
                <td class="btn-group" style="color: #1de35d;font-weight: bold;"> {{'Hoàn thành'}}
                    @endif
                    <a href="{{ route('edit_active2', [$lichtaixe->id]) }}" class='btn btn-default btn-xs'>
                        <i class="fa fa-edit" style="font-size:20px;color:red"></i>
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>