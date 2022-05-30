<div class="table-responsive">
    <table class="table" id="pricecars-table">
        <thead>
            <tr style="background: burlywood;">
                <th>Mã Vé</th>
                <th>Tuyến</th>
                <th>Giờ Xuất Bến</th>
                <th>Thời Gian Dự Kiến</th>
                <th>Loại Xe</th>
                <th>Số Vé</th>
                <th>Giá</th>
                <th>Người cập nhật</th>
                <th>Tình Trạng</th>
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <th style="text-align: center;" colspan="3">Thao tác</th>
                @endif
            </tr>
        </thead>
        <tbody style="background: floralwhite;">
            @foreach($order_ticket as $t)
            <tr>
                <td>{{$t->id??''}}</td>
                <td>{{\App\Models\RouteBus::where(['id' => $t->route_id->route_id??''])->first()->route??''}}</td>
                <td>{{$t->buse->start_time??''}} :{{date('d-m-Y',strtotime($t->buse->start_day??''))}}</td>
                <td>{{\App\Models\RouteBus::where(['id' => $t->route_id->route_id??''])->first()->time_intend??''}} tiếng</td>
                <td>{{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}}</td>
                <td>{{$t->number??''}}vé</td>
                <td>{{($t->total)/1000}}.000 VNĐ</td>
                <td>{{$t->user_edit->name??''}}</td>
                @if ($t->is_active == 1)
                <td style="color: #47e11a;font-weight: bold;"> {{ 'Đã thanh toán' }}</td>
                @elseif($t->is_active == 0)
                <td style="color: #da8f08cf;font-weight: bold;"> {{ 'Chưa thanh toán' }}</td>
                @else($t->is_active == 2)
                <td style="color: red;font-weight: bold;"> {{ 'Đã hủy' }}</td>
                @endif
                @if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
                <td style="text-align: center;" width="120">
                    {!! Form::open(['route' => ['order_ticket.destroy', $t->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('order_ticket.edit', [$t->id]) }}" class='btn btn-default btn-xs'>
                            Cập nhật
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Xóa', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Bạn có chắc chắn xóa?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>